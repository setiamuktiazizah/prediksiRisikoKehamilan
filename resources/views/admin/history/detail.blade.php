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
                <p class="m-0 p-0 text-black"><b>Data Riwayat</b></p>
            </div>
            <div class="card kartu-custom">
                <div class="card-header text-black fw-bold">
                    Hasil Konsultasi
                </div>
                <div class="card-body mt-3">
                    <div class="container-fluid">
                        <h6 class="text-custom">*) Detail Pasien</h6>
                        <table class="table table-bordered custom-table" style="width: 100%">
                            <colgroup>
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 85%;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $namaPemilik }}</td>
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
                        <h6 class="text-custom">*) Detail Diagnosis Risiko Kehamilan</h6>
                        <table class="table table-bordered custom-table" style="width: 100%">
                            <colgroup>
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 5%;">
                                <col span="1" style="width: 80%;">
                            </colgroup>
                            <tr>
                                <td>Tingkat Risiko: </td>
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
                                    <td>{{ $solusi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <a href="{{ URL::to('data-riwayat') }}" class="btn btn-success mb-3">
                <i class="bi bi-arrow-alt-circle-left me-1"></i>
                Kembali
            </a>
        </div>
</main>
@endsection