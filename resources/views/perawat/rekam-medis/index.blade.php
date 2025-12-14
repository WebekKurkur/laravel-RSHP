@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Rekam Medis</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('perawat.rekam-medis.create') }}" class="btn btn-primary">Buat Rekam Medis</a>
                        <a href="{{ route('perawat.dashboard-perawat') }}" class="btn btn-secondary ms-2">Kembali</a>
                    </div>

                    @if($items->isEmpty())
                        <p>Tidak ada rekam medis.</p>
                    @else
                        <div class="card mb-3">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 50px">ID</th>
                                                <th>Temu Dokter / Pet</th>
                                                <th>Tanggal</th>
                                                <th>Diagnosa</th>
                                                <th>Detail</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                <tr class="align-middle">
                                                    <td>{{ $item->idrekam_medis }}</td>
                                                    <td>
                                                        #{{ $item->idreservasi_dokter }}
                                                        @if($item->temuDokter && $item->temuDokter->pet)
                                                            - {{ $item->temuDokter->pet->nama }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->diagnosa }}</td>
                                                    <td>
                                                        @if($item->detail && $item->detail->count())
                                                            <ul class="mb-0">
                                                                @foreach($item->detail as $d)
                                                                    <li>{{ $d->kode ? $d->kode->kode : $d->idkode_tindakan_terapi }} @if($d->detail) - {{ $d->detail }} @endif</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('perawat.rekam-medis.show', $item->idrekam_medis) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
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
            </div>
        </div>
    </div>
</div>
@endsection
