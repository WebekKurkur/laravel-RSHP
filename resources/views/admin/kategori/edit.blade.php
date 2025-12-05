@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>

    <form action="{{ route('admin.kategori.update', $item->idkategori ?? $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ old('nama_kategori', $item->nama_kategori) }}">
            @error('nama_kategori') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
