@extends('layouts.app')

@section('content')

  <div class="container">
    <main>
      <h1>Admin - Daftar Pemilik</h1>
      <div class="mb-3">
        <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
    </main>

    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #eee; text-align: left;">
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">No WA</th>
            <th style="padding:8px;">Alamat</th>
            <th style="padding:8px;">User ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px;">{{ $item->idpemilik ?? $item->id }}</td>
              <td style="padding:8px;">{{ $item->no_wa ?? '-' }}</td>
              <td style="padding:8px;">{{ $item->alamat ?? '-' }}</td>
              <td style="padding:8px;">{{ $item->iduser ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
