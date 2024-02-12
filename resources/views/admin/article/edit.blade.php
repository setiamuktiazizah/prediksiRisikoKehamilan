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
                <p class="m-0 p-0 text-black"><b>Edit Data Artikel</b></p>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('data-artikel.update', $id_artikel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label text-custom">Judul</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $dataArtikel['judul']) }}">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="isi" class="col-sm-2 col-form-label text-custom">Isi</label>
                        <div class="col-sm-5">
                            <input id="isi" type="hidden" name="isi" value="{{ old('isi', $dataArtikel['isi']) }}">
                            <trix-editor input="isi"></trix-editor>
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