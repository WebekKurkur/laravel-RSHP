@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ session('user_name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} {{ session('user_role_name') }}
                    <hr>
                    <div class="mb-2">
                        <a href="{{ route('resepsionis.pemilik.register') }}" class="btn btn-primary">Form Registrasi Pemilik</a>
                        <a href="{{ route('resepsionis.pet.register') }}" class="btn btn-primary">Form Registrasi Pet</a>
                        <a href="{{ route('resepsionis.temu.create') }}" class="btn btn-primary">Form Registrasi Temu Dokter</a>
                        <a href="{{ route('resepsionis.temu.index') }}" class="btn btn-outline-primary">Daftar Pasien</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
