<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\History;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

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
            'id_riwayat' => $dataRiwayat['id_riwayat'],
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

    public function downloadPDF($id_riwayat)
    {
        $riwayat = History::findOrFail($id_riwayat);
        // Decode JSON data
        $diagnosis = json_decode($riwayat->diagnosis);
        $solusi = json_decode($riwayat->solusi);

        // Generate PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('admin.history.pdf', compact('riwayat', 'diagnosis', 'solusi'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Download PDF
        return $dompdf->stream('hasil-konsultasi.pdf');
    }
}
