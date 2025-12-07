@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Reservasi (Temu Dokter) untuk Hewan Saya</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($reservations->isEmpty())
                        <p class="mb-0">Tidak ada reservasi untuk hewan Anda.</p>
                    @else
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pet</th>
                                    <th>Waktu Daftar</th>
                                    <th>Status</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $r)
                                    <tr>
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
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('pemilik.dashboard-pemilik') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
