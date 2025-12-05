@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrasi Temu Dokter</h1>

    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('resepsionis.temu.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Pilih Pet</label>
            <select name="pet_id" class="form-control">
                @foreach ($pets as $p)
                    <option value="{{ $p->idpet }}"> 
                        {{ $p->nama }} (
                            {{ 
                                ($p->pemilik && $p->pemilik->user) ? $p->pemilik->user->nama : 'Pemilik tidak tersedia' 
                            }}
                        )
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Pilih Dokter</label>
            <select name="dokter_id" class="form-control">
                @foreach ($doctors as $d)
                    <option value="{{ $d->idrole_user }}">
                        {{ optional($d->user)->nama ?? 'Dokter tidak tersedia' }} ({{ optional($d->user)->email ?? '-' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal (kosongkan untuk hari ini)</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        </div>

        <button class="btn btn-primary">Daftar Temu</button>
    </form>
</div>
@endsection
