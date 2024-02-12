<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\Diagnose;
use App\Models\History;
use App\Models\KnowledgeBase;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $visualisasiDiagnosis = [
            'Rendah' => History::whereJsonContains('diagnosis', ['nama_diagnosis' => 'Rendah'])->count(),
            'Sedang' => History::whereJsonContains('diagnosis', ['nama_diagnosis' => 'Sedang'])->count(),
            'Tinggi' => History::whereJsonContains('diagnosis', ['nama_diagnosis' => 'Tinggi'])->count(),
        ];

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
            'titlePage' => 'Dashboard',
            'navLink' => 'dashboard',
            'dataDiagnosis' => Diagnose::count(),
            'dataGejala' => Symptom::count(),
            'dataBasisPengetahuan' => KnowledgeBase::count(),
            'dataRiwayat' => History::count(),
            'dataPasien' => User::where('is_admin', 0)->count(),
            'dataArtikel' => Article::count(),
            'article' => Article::latest()->take(5)->get(),
            'activityLogs' => ActivityLog::all(),
            'visualisasiDiagnosis' => $visualisasiDiagnosis,
            'fileContent' => $fileContent,
        ];

        return view('admin.dashboard', $datas);
    }
}
