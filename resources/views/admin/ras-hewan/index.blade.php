@extends('layouts.app')

@section('content')
  <nav class="navbar"><ul><li><a href="{{ route('site.home') }}">Home</a></li></ul></nav>
  <div class="container">
    <h1>Daftar Ras Hewan</h1>
    <p><a href="{{ route('admin.dashboard-admin') }}" class="btn" style="display:inline-block;margin-bottom:10px;">Kembali ke Dashboard</a></p>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Nama Ras</th>
            <th style="padding:8px">Jenis Hewan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idras_hewan ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->nama_ras ?? '-' }}</td>
              <td style="padding:8px">{{ $item->jenis->nama_jenis_hewan ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
