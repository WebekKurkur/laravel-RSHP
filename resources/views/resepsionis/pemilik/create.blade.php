@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrasi Pemilik</h1>

    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>
        <div class="form-group">
            <label>No WA</label>
            <input type="text" name="no_wa" class="form-control" value="{{ old('no_wa') }}">
        </div>
        <button class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
