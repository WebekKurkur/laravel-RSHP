@extends('layouts.app')

@section('content')
  
  <div class="container">
    <h1>Daftar Kategori Klinis</h1>
    <div class="mb-3">
      <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
      <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-primary">Tambah Kategori Klinis</a>
    </div>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Nama Kategori Klinis</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idkategori_klinis ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->nama_kategori_klinis ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
