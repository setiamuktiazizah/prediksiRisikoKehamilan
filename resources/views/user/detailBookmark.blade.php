@extends('template.user.template')

@section('content')
<style>
    /* CSS tambahan untuk judul */
    .title {
        font-size: 30px;
        font-weight: bold;
        color: black;
        text-align: center;
        margin-bottom: 20px;
    }

    /* CSS tambahan untuk tabel */
    .kartu-custom {
        border-radius: 15px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered thead th {
        border-bottom: 2px solid #dee2e6;
        background-color: #7286D3;
        color: #fff;
    }

    .table-bordered tbody td {
        border: 1px solid #dee2e6;
    }

    .table-bordered tbody tr:nth-of-type(even) {
        background-color: #f9f9f9;
    }

    .table-bordered tbody tr:hover {
        background-color: #f0f0f0;
    }

    .table-bordered tbody td:last-child {
        text-align: center;
    }

    .btn-custom-2 {
        color: #fff;
    }
</style>
<section id="hero" class="hero">
    <div class="container-fluid p-0 m-0 my-5">
        <h3 class="title">Hasil Konsultasi</h3>
        <div class="card kartu-custom" style="margin-left: 100px; margin-right: 100px; margin-top: 50px;">
            <div class="card-header text-white fw-bold" style="background-color: #7286D3; font-size: 18px">
                Hasil Konsultasi
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <h6 class="text-custom">*) Detail Pasien</h6>
                    <table class="table table-bordered custom-table" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 85%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Nama Pasien</td>
                                <td>{{ ucwords($namaPemilik) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Gejala yang dialami</h6>
                    <table class="table table-bordered custom-table" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 3%;">
                            <col span="1" style="width: 12%;">
                            <col span="1" style="width: 85%;">
                        </colgroup>
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($diagnosis->gejala_diagnosis as $gejalaYangDipilih)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $gejalaYangDipilih->kode_gejala }}</td>
                                <td>{{ $gejalaYangDipilih->nama_gejala }}</td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Hasil Diagnosa Sementara </h6>
                    @if ($diagnosis->nama_diagnosis == 'Tinggi')
                    <div style="color: red" class="fw-bold">Perlu pemantauan medis yang lebih ketat untuk menjaga kesehatan Anda dan bayi.</div>
                    @else
                    <div style="color: green" class="fw-bold">Saat ini kondisi ibu dan bayi aman namun tetap patuhi perawatan prenatal untuk kesehatan terbaik Anda dan bayi.</div>
                    @endif
                    <table class="table table-bordered custom-table mt-3 mr-5" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 5%;">
                            <col span="1" style="width: 80%;">
                        </colgroup>
                        <tr>
                            <td>Diagnosa Sementara</td>
                            <td class="text-center">:</td>
                            <td class="fw-bold">
                                {{ $diagnosis->nama_diagnosis }}
                            </td>
                        </tr>
                        <tr>
                            <td>Persentase dan Nilai Kepercayaan</td>
                            <td class="text-center align-middle">:</td>
                            <td class="align-middle">{!! '<b>' . $diagnosis->persentase_diagnosis . '</b>' . ' / (' . $diagnosis->nilai_belief . ')' !!}</td>
                        </tr>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Rekomendasi</h6>
                    <table class="table table-bordered custom-table" style="width: 100%">
                        <tbody>
                            @foreach (json_decode($solusi->solusi) as $solusi)
                            <tr>
                                <td style="text-align: justify;">{{ $solusi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>
            <a href="{{ route('riwayat.download-pdf', $id_riwayat) }}" class="btn btn-warning text-center">
                    <i class="bi bi-download me-1"></i>
                    Unduh PDF
                </a>
        </div>
    </div>
</section>
@endsection