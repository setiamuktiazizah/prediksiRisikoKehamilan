<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Riwayat',
            'navLink' => 'data-riwayat',
            'dataRiwayat' => History::all()
        ];

        return view('admin.history.index', $datas);
    }

    public function show($id_riwayat)
    {
        $dataRiwayat = History::find($id_riwayat)->toArray();

        $dataTampilan = [
            'titlePage' => 'Hasil Diagnosis',
            'navLink' => 'diagnosis',
            'namaPemilik' => $dataRiwayat['nama_pemilik'],
            'diagnosis' => json_decode($dataRiwayat['diagnosis']),
            'solusi' => json_decode($dataRiwayat['solusi'])
        ];

        return view('admin.history.detail', $dataTampilan);
    }

    public function destroy($id_riwayat)
    {
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'hapus data riwayat',
        ]);

        $dataRiwayat = History::find($id_riwayat);
        $dataRiwayat->delete();

        return redirect()->to('data-riwayat')->with('success', 'Data Riwayat Berhasil Dihapus');
    }
}
