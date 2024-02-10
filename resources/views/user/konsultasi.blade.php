@extends('template.user.template')

@section('content')
<style>
    /* CSS tambahan untuk judul */
    .title {
        font-size: 30px;
        font-weight: bold;
        color: #7286D3;
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
        <h3 class="title">Halaman Konsultasi</h3>
        <div class="card kartu-custom" style="margin-left: 100px; margin-right: 100px; margin-top: 50px;">
            <div class="card-header text-white fw-bold" style="background-color: #7286D3; font-size: 18px">
                Konsultasi Gejala <br> Silahkan pilih gejala yang Anda alami
            </div>
            <div class="card-body">
                <form action="{{ URL::to('konsultasi') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nama_pemilik" class="col-sm-2 col-form-label text-custom" style="font-weight: bold;">Nama Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
                            @error('nama_pemilik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <div>
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-bordered custom-table" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 3%;">
                            <col span="1" style="width: 12%;">
                            <col span="1" style="width: 80%;">
                            <col span="1" style="width: 5%;">
                        </colgroup>
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($dataGejala as $gejala)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $gejala['kode_gejala'] }}</td>
                                <td>{{ $gejala['gejala'] }}</td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" name="resultGejala[]" value="{{ $gejala['kode_gejala'] }}" @if (is_array(old('resultGejala')) && in_array($gejala['kode_gejala'], old('resultGejala'))) checked @endif>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-custom-2 fw-bold" style="background-color: #7286D3;" type="submit"><i class="bi-solid bi-floppy-disk me-1"></i>
                            Proses Data
                        </button>
                        <button class="btn btn-secondary fw-bold" type="reset"><i class="bi-solid bi-ban me-1"></i>
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</section>
@endsection