@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card kartu-custom">
                <div class="card-header text-black fw-bold text-center">
                    {{ $artikel->judul }}
                </div>
                <div class="card-body mt-3 text-justify">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="data:image; base64, {{ base64_encode($fileContent)}}" style="height: auto; width: 200px" alt="gambar artikel">
                    </div>
                    <div class="container-fluid text-justify mt-3">
                        {!! $artikel->isi !!}
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <a href="{{ URL::to('data-artikel') }}" class="btn btn-success mb-3">
                <i class="bi bi-arrow-alt-circle-left me-1"></i>
                Kembali
            </a>
        </div>
</main>
@endsection