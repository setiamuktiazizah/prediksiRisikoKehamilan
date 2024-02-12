<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

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
        ]);

        $dataArtikel = new Article();
        $dataArtikel->judul = $request->judul;
        $dataArtikel->isi = $request->isi;
        $dataArtikel->save();

        return redirect()->to('data-artikel')->with('success', 'Data artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $artikel = Article::where('slug', $slug)->firstOrFail();
        return view('admin.article.detail', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_artikel, Article $artikel)
    {
        //
        $dataArtikel = $artikel->find($id_artikel)->toArray();

        $datas = [
            'titlePage' => 'Data Artikel',
            'navLink' => 'data-artikel',
            'id_artikel' => $dataArtikel['id'],
            'dataArtikel' => $dataArtikel
        ];

        return view('admin.article.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id_artikel, Request $request, Article $artikel)
    {
        //
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'update data diagnosis',
        ]);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $dataArtikel = $artikel->find($id_artikel);
        $dataArtikel->judul = $request->judul;
        $dataArtikel->isi = $request->isi;
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
            'activity' => 'hapus data diagnosis',
        ]);

        $dataArtikel = $artikel->find($id_artikel);
        $dataArtikel->delete();

        return redirect()->to('data-artikel')->with('success', 'Data Artikel berhasil dihapus');
    }
}
