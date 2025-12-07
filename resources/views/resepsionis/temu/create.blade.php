@extends('layouts.lte.main')

@section('content')
<br>
    <div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Registrasi Temu Dokter</div></div>

            <form action="{{ route('resepsionis.temu.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="row mb-3">
                        <label for="pet_id" class="col-sm-2 col-form-label">Pilih Pet</label>
                        <div class="col-sm-10">
                            <select name="pet_id" id="pet_id" class="form-control @error('pet_id') is-invalid @enderror">
                                <option value="">-- Pilih Pet --</option>
                                @foreach ($pets as $p)
                                    <option value="{{ $p->idpet }}" {{ old('pet_id') == $p->idpet ? 'selected' : '' }}>
                                        {{ $p->nama }} ({{ ($p->pemilik && $p->pemilik->user) ? $p->pemilik->user->nama : 'Pemilik tidak tersedia' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('pet_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="dokter_id" class="col-sm-2 col-form-label">Pilih Dokter</label>
                        <div class="col-sm-10">
                            <select name="dokter_id" id="dokter_id" class="form-control @error('dokter_id') is-invalid @enderror">
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($doctors as $d)
                                    <option value="{{ $d->idrole_user }}" {{ old('dokter_id') == $d->idrole_user ? 'selected' : '' }}>
                                        {{ optional($d->user)->nama ?? 'Dokter tidak tersedia' }} ({{ optional($d->user)->email ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('dokter_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Daftar Temu</button>
                    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
