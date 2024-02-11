<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Diagnose;
use App\Models\History;
use App\Models\KnowledgeBase;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

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

        $datas = [
            'titlePage' => 'Dashboard',
            'navLink' => 'dashboard',
            'dataDiagnosis' => Diagnose::count(),
            'dataGejala' => Symptom::count(),
            'dataBasisPengetahuan' => KnowledgeBase::count(),
            'dataRiwayat' => History::count(),
            'dataPasien' => User::where('is_admin', 0)->count(),
            'activityLogs' => ActivityLog::all(),
            'visualisasiDiagnosis' => $visualisasiDiagnosis,
        ];

        return view('admin.dashboard', $datas);
    }
}
