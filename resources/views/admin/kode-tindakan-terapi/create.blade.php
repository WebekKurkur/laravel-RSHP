@extends('layouts.lte.main')

@section('content')
<div class="container">
    <br>
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Tambah Kode Tindakan Terapi</div></div>
            <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}">
                            @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="deskripsi_tindakan_terapi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_tindakan_terapi" id="deskripsi_tindakan_terapi" class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror">{{ old('deskripsi_tindakan_terapi') }}</textarea>
                            @error('deskripsi_tindakan_terapi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idkategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="idkategori" id="idkategori" class="form-control @error('idkategori') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $k)
                                            <option value="{{ $k->idkategori }}" {{ old('idkategori') == $k->idkategori ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                    @endforeach
                            </select>
                            @error('idkategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idkategori_klinis" class="col-sm-2 col-form-label">Kategori Klinis</label>
                        <div class="col-sm-10">
                            <select name="idkategori_klinis" id="idkategori_klinis" class="form-control @error('idkategori_klinis') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori Klinis --</option>
                                    @foreach($kategoriKlinis as $kk)
                                            <option value="{{ $kk->idkategori_klinis }}" {{ old('idkategori_klinis') == $kk->idkategori_klinis ? 'selected' : '' }}>{{ $kk->nama_kategori_klinis }}</option>
                                    @endforeach
                            </select>
                            @error('idkategori_klinis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
</div>
@endsection
