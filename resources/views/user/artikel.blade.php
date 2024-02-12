@extends('template.user.template')

@section('content')
<section id="hero" class="hero">
    <div class="container-fluid p-0 m-0 my-5">
        <h3 class="title">Halaman Artikel</h3>
        <div class="card-body pb-0">
            <div class="card kartu-custom" style="margin-left: 100px; margin-right: 100px; margin-top: 50px;">
                <div class="card-header text-white fw-bold" style="background-color: #7286D3; font-size: 18px">
                    News &amp; Updates <span>| Today</span>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md g-4">
                        @php
                        // Urutkan artikel berdasarkan waktu secara descending
                        $sortedDataArtikel = $dataArtikel->sortByDesc('created_at');
                        $counts = 0;
                        @endphp

                        @foreach ($sortedDataArtikel as $artikel)
                        <div class="col">
                            <div class="card mb-4 border-0">
                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center mt-5">
                                        @if($artikel->filepath)
                                        <br>
                                        <img src="data:image; base64, {{ base64_encode($fileContent)}}" style="height: auto; width: 200px" alt="gambar artikel">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('data-artikel.show', $artikel->slug) }}" style="color: black;">{{ $artikel->judul }}</a></h5>
                                            <p class="card-text">{!! substr($artikel->isi, 0, 200) !!}{{ strlen($artikel->isi) > 200 ? "..." : "" }}</p>
                                            <button class="btn btn-info"><a href="{{ route('artikel.show', $artikel->slug) }}" style="color: black;">More</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $counts++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection