@extends('template.admin.template')

@section('content')
<main id="main" class="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-custom-2-800">
                <i class="bi bi-book mr-1"></i>
                {{ $titlePage }}
            </h1>
        </div>

        <!-- Content Row -->
        <div class="card kartu-custom mb-5">
            <div class="card-header" style="background-color: #9FC088;">
                <p class="m-0 p-0 text-black"><b>Data Basis Pengetahuan</b></p>
            </div>
            <div class="card-body mt-3">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row justify-content-center align-items-center mt-3"> <!-- Baris di tengah secara horizontal -->
                    <div class="col-md-16">
                        <div class="mb-3">
                            <a href="{{ URL::to('data-basis-pengetahuan/create') }}" class="btn btn-success"> <!-- Tombol penuh lebar -->
                                <i class="bi bi-plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered custom-table" id="responsive-table">
                                <thead class="text-center" style="background-color: #28a745; color: white;">
                                    <tr>
                                        <th class="align-middle">No.</th>
                                        <th class="align-middle">Kode Diagnosis</th>
                                        <th class="align-middle">Kode Gejala</th>
                                        <th class="align-middle">Nilai Densitas</th>
                                        <th class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($dataBasisPengetahuan as $basisPengetahuan)
                                    <tr>
                                        <td class="align-middle text-center">{{ $i }}</td>
                                        <td class="align-middle text-center">{{ $basisPengetahuan->kode_diagnosis }}</td>
                                        <td class="align-middle text-center">{{ $basisPengetahuan->kode_gejala }}</td>
                                        <td class="align-middle text-center">{{ $basisPengetahuan->nilai_densitas }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ URL::to('data-basis-pengetahuan/' . $basisPengetahuan->id_basis_pengetahuan) . '/edit' }}" class="btn btn-warning px-3">
                                                <i class="bi bi-edit me-2"></i>
                                                Edit
                                            </a>
                                            <form action="{{ URL::to('data-basis-pengetahuan/' . $basisPengetahuan->id_basis_pengetahuan) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="bi bi-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
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
                </div>
            </div>
        </div>
    </div>
</main>
@endsection