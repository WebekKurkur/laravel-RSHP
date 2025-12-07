@extends('layouts.lte.main')

@section('content')
<br>
    <div class="container">
        <main>
            <h1>Daftar Pasien (Temu Dokter)</h1>
            <div class="mb-3">
                <a href="{{ route('resepsionis.temu.create') }}" class="btn btn-primary">Tambah Temu</a>
                <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
            </div>
        </main>

        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

        @if(isset($items) && count($items))
            <x-admin-index-card>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 10px">No Urut</th>
                                <th>Tanggal</th>
                                <th>Nama Pet</th>
                                <th>Pemilik</th>
                                <th>Dokter</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $it)
                                <tr class="align-middle">
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
                                                $pemilikNama = optional($pemilik->user)->nama ?? $pemilik->nama ?? $pemilik->no_wa ?? null;
                                            }
                                        @endphp
                                        {{ $pemilikNama ?? 'Pemilik tidak diketahui' }}
                                    </td>
                                    <td>{{ optional($it->roleUser->user)->nama ?? '-' }}</td>
                                    <td>{{ $it->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-slot name="footer">
                    @if(method_exists($items, 'links'))
                        {{ $items->links() }}
                    @endif
                </x-slot>
            </x-admin-index-card>
        @else
            <p>Tidak ada temu dokter.</p>
        @endif
    </div>
@endsection
