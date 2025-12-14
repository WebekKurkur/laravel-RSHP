@extends('layouts.lte.main')

@section('content')
<br>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3><div class="card-header">{{ __('Dashboard') }} - {{ session('user_name') }}</div></h3>

                <div class="card-body">
                    @if (session('success') || session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') ?? session('status') }}
                        </div>
                    @endif

                                        {{ __('You are logged in!') }} {{ session('user_role_name') }}
                                        <hr>

                                        <form method="get" action="{{ route('resepsionis.dashboard-resepsionis') }}" class="row g-2 align-items-center mb-3 justify-content-center">
                                            <div class="col-auto">
                                                <label for="tanggal" class="col-form-label">Tanggal</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $tanggal ?? now()->format('Y-m-d') }}">
                                            </div>

                                            <div class="col-auto">
                                                <label class="form-check-label d-block">Tampilkan</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="showAll" name="all" value="1" {{ isset($showAll) && $showAll ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="showAll">Semua (dari awal data)</label>
                                                    </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="order" class="col-form-label">Urut</label>
                                                <select id="order" name="order" class="form-select">
                                                  <option value="desc" {{ (isset($order) && $order === 'desc') || !isset($order) ? 'selected' : '' }}>Terbaru &rarr; Terlama</option>
                                                  <option value="asc" {{ isset($order) && $order === 'asc' ? 'selected' : '' }}>Terlama &rarr; Terbaru</option>
                                                </select>
                                            </div>

                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                                <a href="{{ route('resepsionis.dashboard-resepsionis') }}" class="btn btn-outline-secondary ms-2">Reset</a>
                                            </div>
                                        </form>

                                        @if(isset($items) && count($items))
                                        <div class="card mb-4">
                                            <div class="card-body p-0">
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
                                                </div>
                                            </div>
                                        @else
                                        <p>Tidak ada temu dokter.</p>
                                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
