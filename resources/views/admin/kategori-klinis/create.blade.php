@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Tambah Kategori Klinis</div></div>
            <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="nama_kategori_klinis" class="col-sm-2 col-form-label">Nama Kategori Klinis</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_kategori_klinis" id="nama_kategori_klinis" class="form-control @error('nama_kategori_klinis') is-invalid @enderror" value="{{ old('nama_kategori_klinis') }}">
                            @error('nama_kategori_klinis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{ route('admin.kategori-klinis.index') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
</div>
@endsection
