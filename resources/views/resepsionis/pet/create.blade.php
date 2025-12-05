@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrasi Pet</h1>

    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form action="{{ route('resepsionis.pet.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Pet</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="form-group">
            <label>Warna / Tanda</label>
            <input type="text" name="warna_tanda" class="form-control" value="{{ old('warna_tanda') }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Jantan (L)</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Betina (P)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Pemilik</label>
            <select name="idpemilik" class="form-control">
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}">{{ optional($p->user)->nama ?? $p->no_wa ?? ('Pemilik #' . ($p->idpemilik ?? '')) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Ras</label>
            <select name="idras_hewan" class="form-control">
                @foreach($ras as $r)
                    <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }} ({{ $r->jenis->nama_jenis_hewan ?? '' }})</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Daftar Pet</button>
    </form>
</div>
@endsection
