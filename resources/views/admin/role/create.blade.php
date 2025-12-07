@extends('layouts.lte.main')

@section('content')
<div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Tambah Role</div></div>
            <form action="{{ route('admin.role.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="nama_role" class="col-sm-2 col-form-label">Nama Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_role') is-invalid @enderror" id="nama_role" name="nama_role" value="{{ old('nama_role') }}">
                            @error('nama_role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{ route('admin.role.index') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
</div>
@endsection
