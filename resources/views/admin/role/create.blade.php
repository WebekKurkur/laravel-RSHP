@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Role</h1>

    <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_role">Nama Role</label>
            <input type="text" name="nama_role" id="nama_role" class="form-control" value="{{ old('nama_role') }}">
            @error('nama_role') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
