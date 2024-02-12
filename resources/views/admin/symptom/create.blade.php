@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-custom-2-800">
                <i class="bi bi-person mr-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card-header" style="background-color: #9FC088;">
                <p class="m-0 p-0 text-black"><b>Tambah Data Gejala</b></p>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('data-gejala.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="kode_gejala" class="col-sm-2 col-form-label text-custom">Kode Gejala</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('kode_gejala') is-invalid @enderror"
                                id="kode_gejala" name="kode_gejala" value="{{ old('kode_gejala') }}">
                            @error('kode_gejala')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gejala" class="col-sm-2 col-form-label text-custom">Nama Gejala</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('gejala') is-invalid @enderror" id="gejala"
                                name="gejala" value="{{ old('gejala') }}">
                            @error('gejala')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label for="nilai_densitas" class="col-sm-2 col-form-label text-custom">Nilai Densitas</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control @error('nilai_densitas') is-invalid @enderror"
                                id="nilai_densitas" name="nilai_densitas" value="{{ old('nilai_densitas') }}" step="0.01">
                            @error('nilai_densitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}
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
