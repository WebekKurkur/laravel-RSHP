@extends('layouts.lte.main')

@section('content')
<div class="container">
    <h1>Tambah Pet</h1>

    <form action="{{ route('admin.pet.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="warna_tanda">Warna / Tanda</label>
            <input type="text" name="warna_tanda" id="warna_tanda" class="form-control" value="{{ old('warna_tanda') }}">
            @error('warna_tanda') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P</option>
            </select>
            @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idpemilik">Pemilik</label>
            <select name="idpemilik" id="idpemilik" class="form-control">
                <option value="">-- Pilih Pemilik --</option>
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>{{ $p->idpemilik }} - {{ $p->no_wa }}</option>
                @endforeach
            </select>
            @error('idpemilik') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="idras_hewan">Ras Hewan</label>
            <select name="idras_hewan" id="idras_hewan" class="form-control">
                <option value="">-- Pilih Ras --</option>
                @foreach($ras as $r)
                    <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>{{ $r->nama_ras }}</option>
                @endforeach
            </select>
            @error('idras_hewan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
