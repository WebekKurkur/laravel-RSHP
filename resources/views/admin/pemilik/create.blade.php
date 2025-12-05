@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pemilik</h1>

    <form action="{{ route('admin.pemilik.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="iduser">User</label>
            <select name="iduser" id="iduser" class="form-control">
                <option value="">-- Pilih User --</option>
                @foreach($users as $u)
                    <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>{{ $u->nama }} ({{ $u->email }})</option>
                @endforeach
            </select>
            @error('iduser') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="no_wa">No WA</label>
            <input type="text" name="no_wa" id="no_wa" class="form-control" value="{{ old('no_wa') }}">
            @error('no_wa') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
