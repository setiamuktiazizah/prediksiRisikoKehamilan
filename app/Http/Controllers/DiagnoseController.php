<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;

use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Diagnosis',
            'navLink' => 'data-diagnosis',
            'dataDiagnosis' => Diagnose::all()
        ];

        return view('admin.diagnose.index', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Diagnosis',
            'navLink' => 'data-diagnosis',
        ];

        return view('admin.diagnose.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Diagnose $diagnosis, Request $request)
    {
        $validateReq = $request->validate([
            'kode_diagnosis' => 'required|unique:diagnose',
            'nama_diagnosis' => 'required'
        ]);

        $solusidiagnosis = $request->get('solusi_diagnosis');
        if ($solusidiagnosis == null) {
            return back()->withInput()->with('errorInput', 'Anda belum mengisi solusi diagnosis');
        }

        $diagnosis->kode_diagnosis = $validateReq['kode_diagnosis'];
        $diagnosis->nama_diagnosis = $validateReq['nama_diagnosis'];
        $diagnosis->solusi = json_encode($solusidiagnosis);
        $diagnosis->save();

        return redirect()->to('data-diagnosis')->with('success', 'Data diagnosis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnose $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit($id_diagnosis, Diagnose $diagnosis)
    {
        $dataDiagnosis = $diagnosis->find($id_diagnosis)->toArray();

        $datas = [
            'titlePage' => 'Data diagnosis',
            'navLink' => 'data-diagnosis',
            'id_diagnosis' => $dataDiagnosis['id_diagnosis'],
            'dataDiagnosis' => $dataDiagnosis
        ];

        return view('admin.diagnose.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update($id_diagnosis, Request $request, Diagnose $diagnosis)
    {
        $validateReq = $request->validate([
            'kode_diagnosis' => 'required',
            'nama_diagnosis' => 'required'
        ]);

        $solusidiagnosis = $request->get('solusi_diagnosis');
        if ($solusidiagnosis == null) {
            return back()->withInput()->with('errorInput', 'Anda belum mengisi solusi diagnosis');
        }

        $datadiagnosis = $diagnosis->find($id_diagnosis);
        $datadiagnosis->kode_diagnosis = $validateReq['kode_diagnosis'];
        $datadiagnosis->nama_diagnosis = $validateReq['nama_diagnosis'];
        $datadiagnosis->solusi = json_encode($solusidiagnosis);
        $datadiagnosis->save();

        return redirect()->route('data-diagnosis.index')->with('success', 'Data diagnosis berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_diagnosis, Diagnose $diagnosis)
    {
        $datadiagnosis = $diagnosis->find($data_diagnosis);
        $datadiagnosis->delete();

        return redirect()->to('data-diagnosis')->with('success', 'Data diagnosis berhasil dihapus');
    }
}
