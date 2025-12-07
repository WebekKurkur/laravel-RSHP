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

                    <div class="mt-3">
                        <a href="{{ route('pemilik.pets.index') }}" class="btn btn-primary">Hewan Peliharaan Saya</a>
                        <a href="{{ route('pemilik.rekam-medis.index') }}" class="btn btn-secondary ms-2">Rekam Medis Saya</a>
                        <a href="{{ route('pemilik.reservations.index') }}" class="btn btn-info ms-2">Reservasi Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
