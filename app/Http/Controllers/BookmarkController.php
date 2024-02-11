<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $dataBookmark = History::where('user_id', $user->id)->orderByDesc('created_at')->get();
        return view('user.bookmark', compact('dataBookmark'));
    }

    public function showdata($id_bookmark)
    {
        $dataKonsultasi = History::find($id_bookmark)->toArray();

        $dataTampilan = [
            'titlePage' => 'Hasil Konsultasi',
            'navLink' => 'konsultasi',
            'namaPemilik' => $dataKonsultasi['nama_pemilik'],
            'diagnosis' => json_decode($dataKonsultasi['diagnosis']),
            'solusi' => json_decode($dataKonsultasi['solusi'])
        ];

        return view('user.detailBookmark', $dataTampilan);
    }
}
