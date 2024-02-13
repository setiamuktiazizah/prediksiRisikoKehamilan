@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-custom-2-800">
                <i class="bi bi-pencil mr-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card-header" style="background-color: #9FC088;">
                <p class="m-0 p-0 text-black"><b>Tambah Data Diagnosis</b></p>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('data-diagnosis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="kode_diagnosis" class="col-sm-2 col-form-label text-custom">Kode Diagnosis</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('kode_diagnosis') is-invalid @enderror" id="kode_diagnosis" name="kode_diagnosis" value="{{ old('kode_diagnosis') }}">
                            @error('kode_diagnosis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_diagnosis" class="col-sm-2 col-form-label text-custom">Jenis Diagnosis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nama_diagnosis') is-invalid @enderror" id="nama_diagnosis" name="nama_diagnosis" value="{{ old('nama_diagnosis') }}">
                            @error('nama_diagnosis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_diagnosis" class="col-sm-2 col-form-label text-custom">Rekomendasi</label>
                        <div class="col-sm-8" id="containerSolusi">
                            <button class="btn btn-custom-2 mb-2" type="button" onclick="addInput('nama_diagnosis');">
                                <i class="bi bi-plus me-1"></i>
                                Tambah Solusi
                            </button>
                            @if (session()->has('errorInput'))
                            <p class="text-custom">{{ session('errorInput') }}</p>
                            @endif
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

