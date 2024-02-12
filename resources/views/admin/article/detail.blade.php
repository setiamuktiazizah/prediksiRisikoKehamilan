@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card kartu-custom text-center">
                <div class="card-header text-black fw-bold">
                    {{ $artikel->judul }}
                </div>
                <div class="card-body mt-3 text-justify">
                    <div class="container-fluid">
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