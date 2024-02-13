<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class NewsController extends Controller
{
    //
    public function index()
    {
        //
        $dataArtikel = Article::all();
        
        // Ambil URL gambar dari Google Drive
        foreach ($dataArtikel as $artikel) {
            if ($artikel->filepath) {
                $googleDriverFileId = $artikel->filepath;
                $data = Gdrive::get($googleDriverFileId);
                $fileContent = $data->file;
            }
        }

        $datas = [
            'dataArtikel' => $dataArtikel,
            'fileContent' => $fileContent,
        ];
        return view('user.artikel', $datas);
    }

    public function show($slug)
    {
        //
        $artikel = Article::where('slug', $slug)->firstOrFail();
        $googleDriverFileId = $artikel->filepath;

        if (!$googleDriverFileId) {
            return response('File not found', 404);
        }

        $data = Gdrive::get($googleDriverFileId);
        return view('user.detailArtikel', [
            'artikel' => $artikel,
            'fileContent' => $data->file,
        ]);
    }
}
