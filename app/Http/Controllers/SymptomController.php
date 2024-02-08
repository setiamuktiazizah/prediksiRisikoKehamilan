<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'navLink' => 'data-gejala',
            'dataGejala' => Symptom::all()
        ];

        return view('admin.symptom.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'navLink' => 'data-gejala',
        ];

        return view('admin.symptom.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Symptom $gejala, Request $request)
    {
        $validateReq = $request->validate([
            'kode_gejala' => 'required|unique:symptom',
            'gejala' => 'required',
        ]);

        $gejala->kode_gejala = $validateReq['kode_gejala'];
        $gejala->gejala = $validateReq['gejala'];
        $gejala->save();

        return redirect()->to('data-gejala')->with('success', 'Data Gejala berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symptom  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptom  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit($id_gejala, Symptom $gejala)
    {
        $dataGejala = $gejala->find($id_gejala)->toArray();

        $datas = [
            'titlePage' => 'Data Gejala',
            'navLink' => 'data-gejala',
            'id_gejala' => $dataGejala['id_gejala'],
            'dataGejala' => $dataGejala
        ];

        return view('admin.symptom.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptom  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update($id_gejala, Request $request, Symptom $gejala)
    {
        $dataGejala = $gejala->find($id_gejala);

        $validateReq = $request->validate([
            'kode_gejala' => 'required',
            'gejala' => 'required',
        ]);

        $dataGejala->kode_gejala = $validateReq['kode_gejala'];
        $dataGejala->gejala = $validateReq['gejala'];
        $dataGejala->save();

        return redirect()->to('data-gejala')->with('success', 'Data Gejala berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptom  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gejala, Symptom $gejala)
    {
        $dataGejala = $gejala->find($id_gejala);
        $dataGejala->delete();

        return redirect()->to('data-gejala')->with('success', 'Data Gejala berhasil dihapus');
    }
}
