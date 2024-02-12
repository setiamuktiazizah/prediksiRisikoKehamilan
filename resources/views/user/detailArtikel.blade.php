@extends('template.user.template')

@section('content')
<section id="hero" class="hero">
    <div class="container-fluid p-0 m-0 my-5">
        <h3 class="title">Detail Artikel</h3>
        <div class="card-body pb-0">
            <div class="card kartu-custom" style="margin-left: 100px; margin-right: 100px; margin-top: 50px;">
                <div class="card-header text-white fw-bold text-center" style="background-color: #7286D3; font-size: 18px">
                    {{ $artikel->judul }}</span>
                </div>

                <!-- Content Row -->
                <!-- <div class="card kartu-custom mb-5">
                <div class="card kartu-custom text-center">
                    <div class="card-header text-black fw-bold">
                        {{ $artikel->judul }}
                    </div>
                    <div class="card-body mt-3 text-justify"> -->
                <div class="container-fluid mt-3 mb-3">
                    {!! $artikel->isi !!}
                </div>
                <!-- </div>
                    <div class="card-footer"></div>
                </div> -->
                <a href="{{ route('artikel') }}" class="btn btn-info mb-3">
                    <i class="bi bi-arrow-alt-circle-left me-1"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</section>
@endsection