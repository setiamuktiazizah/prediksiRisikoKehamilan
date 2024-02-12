<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        //
        $datas = [
            'titlePage' => 'Data Artikel',
            'navLink' => 'data-artikel',
            'dataArtikel' => Article::all()
        ];
        return view('user.artikel', $datas);
    }

    public function show($slug)
    {
        //
        $artikel = Article::where('slug', $slug)->firstOrFail();
        return view('user.detailArtikel', compact('artikel'));
    }
}
