@extends('layouts.app')

@section('content')
 
  <div class="container">
    <h1>Daftar Kode Tindakan Terapi</h1>
    <div class="mb-3">
      <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
      <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-primary">Tambah Kode Tindakan</a>
    </div>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Kode</th>
            <th style="padding:8px">Deskripsi</th>
            <th style="padding:8px">Kategori</th>
            <th style="padding:8px">Kategori Klinis</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idkode_tindakan_terapi ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->kode ?? '-' }}</td>
              <td style="padding:8px">{{ $item->deskripsi_tindakan_terapi ?? '-' }}</td>
              <td style="padding:8px">{{ $item->kategori->nama_kategori ?? '-' }}</td>
              <td style="padding:8px">{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
