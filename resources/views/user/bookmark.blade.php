@extends('template.user.template')

@section('content')
<section id="hero" class="hero">
    <div class="container-fluid p-0 m-0 my-5">
        <h3 class="title">Halaman Bookmark</h3>
        <div class="card kartu-custom" style="margin-left: 100px; margin-right: 100px; margin-top: 50px;">
            <div class="card-header text-white fw-bold" style="background-color: #7286D3; font-size: 18px">
                Riwayat Konsultasi
            </div>
            <div class="card-body">
                <table class="table table-bordered custom-table" style="width: 100%">
                    <colgroup>
                        <col span="1" style="width: 3%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 60%;">
                        <col span="1" style="width: 17%;">
                    </colgroup>
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Diagnosis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($dataBookmark as $bookmark)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="align-middle text-center">{{ ucwords($bookmark['nama_pemilik']) }}</td>
                            @if(json_decode($bookmark->diagnosis)->nama_diagnosis == 'Tinggi')
                            <td class="align-middle text-center">
                                <button class="btn btn-danger">Tinggi</button>
                            </td>
                            @elseif(json_decode($bookmark->diagnosis)->nama_diagnosis == 'Sedang')
                            <td class="align-middle text-center">
                                <button class="btn btn-warning">Sedang</button>
                            </td>
                            @else
                            <td class="align-middle text-center">
                                <button class="btn btn-success">Rendah</button>
                            </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('bookmark.show', $bookmark->id_riwayat) }}" class="btn btn-success">
                                    <i class="bi bi-eye me-1"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection