<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\KnowledgeBase;
use App\Models\Symptom;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'navLink' => 'data-basis-pengetahuan',
            'dataBasisPengetahuan' => KnowledgeBase::all()
        ];

        return view('admin.knowledgeBase.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'navLink' => 'data-basis-pengetahuan',
            'dataDiagnosis' => Diagnose::all(),
            'dataGejala' => Symptom::all()
        ];

        return view('admin.knowledgeBase.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KnowledgeBase $basisPengetahuan, Request $request)
    {
        $validateReq = $request->validate([
            'kode_diagnosis' => 'required',
            'kode_gejala' => 'required',
            'nilai_densitas' => 'required'
        ]);

        $basisPengetahuan->kode_diagnosis = $validateReq['kode_diagnosis'];
        $basisPengetahuan->kode_gejala = $validateReq['kode_gejala'];
        $basisPengetahuan->nilai_densitas = $validateReq['nilai_densitas'];
        $basisPengetahuan->save();

        return redirect()->to('data-basis-pengetahuan')->with('success', 'Data Basis Pengetahuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KnowledgeBase  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(KnowledgeBase $basisPengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KnowledgeBase  $basisPengetahuan
     * @return \Illuminate\Http\KnowledgeBase
     */
    public function edit($id_basis_pengetahuan, KnowledgeBase $basisPengetahuan)
    {
        $dataBasisPengetahuan = $basisPengetahuan->find($id_basis_pengetahuan)->toArray();

        $datas = [
            'titlePage' => 'Data Basis Pengetahuan',
            'navLink' => 'data-basis-pengetahuan',
            'dataDiagnosis' => Diagnose::all(),
            'dataGejala' => Symptom::all(),
            'id_basis_pengetahuan' => $dataBasisPengetahuan['id_basis_pengetahuan'],
            'dataBasisPengetahuan' => $dataBasisPengetahuan
        ];

        return view('admin.knowledgeBase.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KnowledgeBase  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update($id_basis_pengetahuan, Request $request, KnowledgeBase $basisPengetahuan)
    {
        $dataBasisPengetahuan = $basisPengetahuan->find($id_basis_pengetahuan);

        $validateReq = $request->validate([
            'kode_diagnosis' => 'required',
            'kode_gejala' => 'required',
            'nilai_densitas' => 'required'
        ]);

        $dataBasisPengetahuan->kode_diagnosis = $validateReq['kode_diagnosis'];
        $dataBasisPengetahuan->kode_gejala = $validateReq['kode_gejala'];
        $dataBasisPengetahuan->nilai_densitas = $validateReq['nilai_densitas'];
        $dataBasisPengetahuan->save();

        return redirect()->to('data-basis-pengetahuan')->with('success', 'Data Basis Pengetahuan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KnowledgeBase  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_basis_pengetahuan, KnowledgeBase $basisPengetahuan)
    {
        $dataBasisPengetahuan = $basisPengetahuan->find($id_basis_pengetahuan);
        $dataBasisPengetahuan->delete();

        return redirect()->to('data-basis-pengetahuan')->with('success', 'Data Basis Pengetahuan berhasil dihapus');
    }
}
