@extends('layouts.app')

@section('content')
  <nav class="navbar"><ul><li><a href="{{ route('site.home') }}">Home</a></li></ul></nav>
  <div class="container">
    <h1>Daftar Ras Hewan</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
        <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-primary">Tambah Ras</a>
    </div>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Nama Ras</th>
            <th style="padding:8px">Jenis Hewan</th>
            <th style="padding:8px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idras_hewan ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->nama_ras ?? '-' }}</td>
              <td style="padding:8px">{{ $item->jenis->nama_jenis_hewan ?? '-' }}</td>
              <td style="padding:8px">
                <a href="{{ route('admin.ras-hewan.edit', $item->idras_hewan ?? $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.ras-hewan.destroy', $item->idras_hewan ?? $item->id) }}" method="POST" style="display:inline-block; margin-left:6px;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus ras hewan ini?')">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
