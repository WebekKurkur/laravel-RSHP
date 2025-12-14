@extends('layouts.lte.main')

@section('content')
<br>
    <div class="container">
        <main>
            <h1>Rekam Medis Saya</h1>
        </main>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($items->isEmpty())
            <p class="mb-0">Tidak ada rekam medis untuk hewan Anda.</p>
        @else
            <div class="card mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Pet</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Diagnosa</th>
                                    <th style="width:130px" class="text-center">Jumlah Detail</th>
                                    <th style="width:110px" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $it)
                                    <tr class="align-middle">
                                        <td>{{ $it->idrekam_medis }}</td>
                                        <td>{{ $it->temuDokter && $it->temuDokter->pet ? $it->temuDokter->pet->nama : '-' }}</td>
                                        <td>{{ $it->created_at }}</td>
                                        <td>{{ $it->temuDokter && isset($it->temuDokter->status) ? $it->temuDokter->status : '-' }}</td>
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
                </div>
            </div>
        @endif

        
    </div>
@endsection
