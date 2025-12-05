@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.user.update', $user->iduser ?? $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password (biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <hr>
    <form action="{{ route('admin.user.reset', $user->iduser ?? $user->id) }}" method="POST" onsubmit="return confirm('Reset password user ini ke default?')">
        @csrf
        <button class="btn btn-warning">Reset Password ke 'password'</button>
    </form>
</div>
@endsection
