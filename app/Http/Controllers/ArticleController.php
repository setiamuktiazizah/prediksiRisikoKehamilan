<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = [
            'titlePage' => 'Data Artikel',
            'navLink' => 'data-artikel',
            'dataArtikel' => Article::all()
        ];
        return view('admin.article.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datas = [
            'titlePage' => 'Data Artikel',
            'navLink' => 'data-artikel',
        ];

        return view('admin.article.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $artikel, Request $request)
    {
        //
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'tambah data artikel',
        ]);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'file',
        ]);

        $uploadedFile = $request->file('file');
        $uuid = Uuid::uuid4();
        $fileName = $uuid->toString() . '_' . $uploadedFile->getClientOriginalName();
        $filePath = public_path('uploads/foto-artikel');
        $uploadedFile->move($filePath, $fileName);
        $path = public_path() . '/uploads/foto-artikel/' . $fileName;

        Storage::disk('google')->put('foto-artikel/' . $fileName, File::get($path));

        $dataArtikel = new Article();
        $dataArtikel->judul = $request->judul;
        $dataArtikel->isi = $request->isi;
        $dataArtikel->filepath = 'foto-artikel/' . $fileName;
        $dataArtikel->save();

        return redirect()->to('data-artikel')->with('success', 'Data artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'lihat data artikel',
        ]);

        $dataArtikel = Article::where('slug', $slug)->firstOrFail();

        $googleDriverFileId = $dataArtikel->filepath;

        if (!$googleDriverFileId) {
            return response('File not found', 404);
        }

        $data = Gdrive::get($googleDriverFileId);

        return view('admin.article.detail', [
            'artikel' => $dataArtikel,
            'fileContent' => $data->file,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_artikel, Article $artikel)
    {
        //
        $dataArtikel = $artikel->findOrFail($id_artikel);;

        $googleDriverFileId = $dataArtikel->filepath;

        if (!$googleDriverFileId) {
            return response('File not found', 404);
        }

        $data = Gdrive::get($googleDriverFileId);

        $datas = [
            'titlePage' => 'Data Artikel',
            'navLink' => 'data-artikel',
            'id_artikel' => $dataArtikel['id'],
            'dataArtikel' => $dataArtikel,
            'fileContent' => $data->file,
        ];

        return view('admin.article.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id_artikel, Request $request, Article $artikel)
    {
        //
        $dataArtikel = Article::findOrFail($id_artikel);

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'update data artikel',
        ]);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'file',
        ]);

        $newFileName = $dataArtikel->filepath;

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $uuid = Uuid::uuid4();
            $newFileName = $uuid->toString() . '_' . $uploadedFile->getClientOriginalName();
            $filePath = public_path('uploads');
            $uploadedFile->move($filePath, $newFileName);

            Storage::disk('google')->delete($dataArtikel->filepath);

            Storage::disk('google')->put('foto-artikel/' . $newFileName, File::get($filePath . '/' . $newFileName));
        }

        // $dataArtikel = $artikel->find($id_artikel);
        $dataArtikel->judul = $request->judul;
        $dataArtikel->isi = $request->isi;
        $dataArtikel->filepath = 'foto-artikel/' . $newFileName;
        $dataArtikel->save();

        return redirect()->to('data-artikel')->with('success', 'Data artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_artikel, Article $artikel)
    {
        //
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'hapus data artikel',
        ]);

        $dataArtikel = $artikel->find($id_artikel);

        $fileName = $dataArtikel->filepath;
        $dataArtikel->delete();
        if ($fileName) {
            Storage::disk('google')->delete('foto-artikel/' . $fileName);
        }

        return redirect()->to('data-artikel')->with('success', 'Data Artikel berhasil dihapus');
    }
}
