@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pasien (Temu Dokter)</h1>

    <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    @if(isset($items) && count($items))
        <table class="table">
            <thead>
                <tr>
                    <th>No Urut</th>
                    <th>Tanggal</th>
                    <th>Nama Pet</th>
                    <th>Pemilik</th>
                    <th>Dokter</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $it)
                <tr>
                    <td>{{ $it->nomor_urut }}</td>
                    <td>
                        @if($it->waktu_daftar)
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $it->waktu_daftar, 'Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $it->pet->nama ?? '-' }}</td>
                    <td>
                        @php
                            $pemilik = $it->pet->pemilik ?? null;
                            $pemilikNama = null;
                            if ($pemilik) {
                                // prefer linked user name
                                $pemilikNama = optional($pemilik->user)->nama ?? $pemilik->nama ?? $pemilik->no_wa ?? null;
                            }
                        @endphp
                        {{ $pemilikNama ?? 'Pemilik tidak diketahui' }}
                    </td>
                    <td>{{ $it->dokter->nama ?? '-' }}</td>
                    <td>{{ $it->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada temu dokter.</p>
    @endif
</div>
@endsection
