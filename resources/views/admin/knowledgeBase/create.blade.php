@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-custom-2-800">
                <i class="bi bi-diagram-2 mr-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card-header" style="background-color: #9FC088;">
                <p class="m-0 p-0 text-black"><b>Tambah Data Basis Pengetahuan</b></p>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('data-basis-pengetahuan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="kode_diagnosis" class="col-sm-2 col-form-label text-custom">Kode Diagnosis</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="kode_diagnosis" name="kode_diagnosis">
                                <option selected disabled>Pilih Kode Diagnosis...</option>
                                @foreach ($dataDiagnosis as $diagnosis)
                                    @if (old('kode_diagnosis') == $diagnosis->kode_diagnosis)
                                        <option value="{{ $diagnosis->kode_diagnosis }}" selected>
                                            {{ $diagnosis->kode_diagnosis . ' - ' . $diagnosis->nama_diagnosis }}</option>
                                    @else
                                        <option value="{{ $diagnosis->kode_diagnosis }}">
                                            {{ $diagnosis->kode_diagnosis . ' - ' . $diagnosis->nama_diagnosis }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kode_gejala" class="col-sm-2 col-form-label text-custom">Kode Gejala</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="kode_gejala" name="kode_gejala">
                                <option selected disabled>Pilih Kode Gejala...</option>
                                @foreach ($dataGejala as $gejala)
                                    @if (old('kode_gejala') == $gejala->kode_gejala)
                                        <option value="{{ $gejala->kode_gejala }}" selected>
                                            {{ $gejala->kode_gejala . ' - ' . $gejala->gejala }}</option>
                                    @else
                                        <option value="{{ $gejala->kode_gejala }}">
                                            {{ $gejala->kode_gejala . ' - ' . $gejala->gejala }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_densitas" class="col-sm-2 col-form-label text-custom">Nilai Densitas</label>
                        <div class="col-sm-5">
                            <input type="text" min="0" name="nilai_densitas" id="nilai_densitas">
                            @error('nilai_densitas')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-custom-2 me-md-2" type="submit">
                                <i class="bi bi-save me-1"></i>
                                Simpan Data
                            </button>
                            <button class="btn btn-secondary" type="reset">
                                <i class="bi bi-ban me-1"></i>
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
