@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kategori Klinis</h1>

    <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_kategori_klinis">Nama Kategori Klinis</label>
            <input type="text" name="nama_kategori_klinis" id="nama_kategori_klinis" class="form-control" value="{{ old('nama_kategori_klinis') }}">
            @error('nama_kategori_klinis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
