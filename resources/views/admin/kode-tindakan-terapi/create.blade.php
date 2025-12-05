@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kode Tindakan Terapi</h1>

    <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode') }}">
            @error('kode') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi_tindakan_terapi">Deskripsi</label>
            <textarea name="deskripsi_tindakan_terapi" id="deskripsi_tindakan_terapi" class="form-control">{{ old('deskripsi_tindakan_terapi') }}</textarea>
            @error('deskripsi_tindakan_terapi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idkategori">Kategori</label>
            <select name="idkategori" id="idkategori" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->idkategori }}" {{ old('idkategori') == $k->idkategori ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
            @error('idkategori') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idkategori_klinis">Kategori Klinis</label>
            <select name="idkategori_klinis" id="idkategori_klinis" class="form-control">
                <option value="">-- Pilih Kategori Klinis --</option>
                @foreach($kategoriKlinis as $kk)
                    <option value="{{ $kk->idkategori_klinis }}" {{ old('idkategori_klinis') == $kk->idkategori_klinis ? 'selected' : '' }}>{{ $kk->nama_kategori_klinis }}</option>
                @endforeach
            </select>
            @error('idkategori_klinis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
