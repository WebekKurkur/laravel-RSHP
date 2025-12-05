@extends('layouts.app')

@section('content')
 
  <div class="container">
    <h1>Daftar Pet</h1>
    <div class="mb-3">
      <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
    </div>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Nama</th>
            <th style="padding:8px">Tanggal Lahir</th>
            <th style="padding:8px">Pemilik</th>
            <th style="padding:8px">Ras</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idpet ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->nama ?? '-' }}</td>
              <td style="padding:8px">{{ $item->tanggal_lahir ?? '-' }}</td>
              <td style="padding:8px">{{ $item->pemilik->idpemilik ?? '-' }}</td>
              <td style="padding:8px">{{ $item->ras->nama_ras ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
