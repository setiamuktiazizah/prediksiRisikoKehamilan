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
                <p class="m-0 p-0 text-black"><b>Edit Data User</b></p>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('data-user.update', $id_user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label text-custom">Nama</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dataUser['name']) }}" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label text-custom">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dataUser['email']) }}" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label text-custom">Role</label>
                        <select name="role" class="form-control">
                            <option value="1" {{ $dataUser['is_admin'] ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $dataUser['is_admin'] ? '' : 'selected' }}>User</option>
                        </select>
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