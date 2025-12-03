@extends('layouts.app')

@section('content')

  <div class="container">
    <main>
      <h1>Admin - Daftar Jenis Hewan</h1>
      <p><a href="{{ route('admin.dashboard-admin') }}" class="btn" style="display:inline-block;margin-bottom:10px;">Kembali ke Dashboard</a></p>
    </main>

    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #eee; text-align: left;">
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Nama Jenis Hewan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px;">{{ $item->idjenis_hewan ?? $item->id }}</td>
              <td style="padding:8px;">{{ $item->nama_jenis_hewan ?? $item->name ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
