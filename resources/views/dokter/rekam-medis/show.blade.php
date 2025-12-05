@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Rekam Medis #{{ $item->idrekam_medis }}</div>

                <div class="card-body">
                    <p><strong>Temu Dokter:</strong> #{{ $item->idreservasi_dokter }} @if($item->temuDokter && $item->temuDokter->pet) - {{ $item->temuDokter->pet->nama }} @endif</p>
                    <p><strong>Tanggal:</strong> {{ $item->created_at }}</p>
                    <p><strong>Anamnesa:</strong><br>{{ $item->anamnesa }}</p>
                    <p><strong>Temuan Klinis:</strong><br>{{ $item->temuan_klinis }}</p>
                    <p><strong>Diagnosa:</strong><br>{{ $item->diagnosa }}</p>
                    <p><strong>Dokter Pemeriksa:</strong>
                        @if($item->temuDokter && $item->temuDokter->roleUser && $item->temuDokter->roleUser->user)
                            {{ $item->temuDokter->roleUser->user->nama }}
                        @else
                            -
                        @endif
                    </p>

                    <hr>
                    <h5>Detail Tindakan</h5>
                    @if($item->detail && $item->detail->count())
                        <ul>
                            @foreach($item->detail as $d)
                                <li>
                                    {{ $d->kode ? ($d->kode->kode . ' - ' . $d->kode->deskripsi_tindakan_terapi) : ('Kode: ' . $d->idkode_tindakan_terapi) }}
                                    @if($d->detail) - {{ $d->detail }} @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Tidak ada detail tindakan.</p>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-link">Kembali</a>
                        <a href="{{ route('dokter.dashboard-dokter') }}" class="btn btn-secondary ms-2">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
