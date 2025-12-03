@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }} - {{ session('user_name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Selamat datang di dashboard admin.') }} {{ session('user_role_name') }}</p>

                    <div class="mb-3">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-2">Daftar User</a>
                        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary mb-2">Daftar Role</a>
                        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-success mb-2">Daftar Pemilik</a>
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-info mb-2">Daftar Pet</a>
                        <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-warning mb-2">Daftar Jenis Hewan</a>
                        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-dark mb-2">Daftar Ras Hewan</a>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-primary mb-2">Daftar Kategori</a>
                        <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-outline-secondary mb-2">Daftar Kategori Klinis</a>
                        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-outline-success mb-2">Daftar Kode Tindakan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection