@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
        <main>
                <h1>Dashboard Pemilik</h1>
        </main>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header">Daftar Reservasi Saya</div>
            <div class="card-body p-0">
                @if(isset($reservations) && count($reservations))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:10px">ID</th>
                                    <th>Pet</th>
                                    <th>Waktu Daftar</th>
                                    <th>Status</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $r)
                                    <tr class="align-middle">
                                        <td>{{ $r->idreservasi_dokter }}</td>
                                        <td>{{ $r->pet ? $r->pet->nama : '-' }}</td>
                                        <td>{{ $r->waktu_daftar }}</td>
                                        <td>{{ $r->status }}</td>
                                        <td>{{ $r->roleUser && $r->roleUser->user ? $r->roleUser->user->nama : '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-3">Tidak ada reservasi untuk hewan Anda.</div>
                @endif
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('pemilik.pets.index') }}" class="btn btn-secondary">Daftar Hewan</a>
            <a href="{{ route('pemilik.rekam-medis.index') }}" class="btn btn-secondary ms-2">Daftar Rekam Medis</a>
        </div>

</div>
@endsection
