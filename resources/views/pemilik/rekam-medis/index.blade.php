@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Rekam Medis untuk Hewan Saya</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($items->isEmpty())
                        <p class="mb-0">Tidak ada rekam medis untuk hewan Anda.</p>
                    @else
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pet</th>
                                    <th>Tanggal</th>
                                    <th>Diagnosa</th>
                                    <th class="text-center">Jumlah Detail</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $it)
                                    <tr>
                                        <td>{{ $it->idrekam_medis }}</td>
                                        <td>{{ $it->temuDokter && $it->temuDokter->pet ? $it->temuDokter->pet->nama : '-' }}</td>
                                        <td>{{ $it->created_at }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($it->diagnosa ?? '-', 80) }}</td>
                                        <td class="text-center">{{ $it->detail ? $it->detail->count() : 0 }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pemilik.rekam-medis.show', $it->idrekam_medis) }}" class="btn btn-sm btn-primary">Lihat</a>
                                        </td>
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
