@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Edit User</div></div>
            <form action="{{ route('admin.user.update', $user->iduser ?? $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password (kosong jika tidak diubah)</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning">Simpan Perubahan</button>
                    <a href="{{ route('admin.user.index') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header"><div class="card-title">Reset Password</div></div>
            <form action="{{ route('admin.user.reset', $user->iduser ?? $user->id) }}" method="POST" onsubmit="return confirm('Reset password user ini ke default?')">
                @csrf
                <div class="card-body">
                    <p>Reset password user ini ke nilai default <strong>password</strong>.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning">Reset Password ke 'password'</button>
                </div>
            </form>
        </div>
</div>
@endsection
