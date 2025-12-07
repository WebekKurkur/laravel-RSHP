@extends('layouts.lte.main')

@section('content')
<br>
    <div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Registrasi Pet</div></div>

            <form action="{{ route('resepsionis.pet.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pet</label>
                        <div class="col-sm-10">
                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="warna_tanda" class="col-sm-2 col-form-label">Warna / Tanda</label>
                        <div class="col-sm-10">
                            <input type="text" id="warna_tanda" name="warna_tanda" class="form-control @error('warna_tanda') is-invalid @enderror" value="{{ old('warna_tanda') }}">
                            @error('warna_tanda') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Jantan (L)</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Betina (P)</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idpemilik" class="col-sm-2 col-form-label">Pemilik</label>
                        <div class="col-sm-10">
                            <select id="idpemilik" name="idpemilik" class="form-control @error('idpemilik') is-invalid @enderror">
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>{{ optional($p->user)->nama ?? $p->no_wa ?? ('Pemilik #' . ($p->idpemilik ?? '')) }}</option>
                                @endforeach
                            </select>
                            @error('idpemilik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idras_hewan" class="col-sm-2 col-form-label">Ras</label>
                        <div class="col-sm-10">
                            <select id="idras_hewan" name="idras_hewan" class="form-control @error('idras_hewan') is-invalid @enderror">
                                <option value="">-- Pilih Ras --</option>
                                @foreach($ras as $r)
                                    <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan') == $r->idras_hewan ? 'selected' : '' }}>{{ $r->nama_ras }} ({{ $r->jenis->nama_jenis_hewan ?? '' }})</option>
                                @endforeach
                            </select>
                            @error('idras_hewan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Daftar Pet</button>
                    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
