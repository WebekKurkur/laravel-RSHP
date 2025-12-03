@extends('layouts.app')

@section('content')
  <div class="container">
    <main>
      <h1>Admin - Daftar Users</h1>
      <p><a href="{{ route('admin.dashboard-admin') }}" class="btn" style="display:inline-block;margin-bottom:10px;">Kembali ke Dashboard</a></p>
    </main>

    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #eee; text-align: left;">
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Nama</th>
            <th style="padding:8px;">Email</th>
            <th style="padding:8px;">Roles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px;">{{ $item->iduser ?? $item->id }}</td>
              <td style="padding:8px;">{{ $item->nama ?? $item->name ?? '-' }}</td>
              <td style="padding:8px;">{{ $item->email ?? '-' }}</td>
              <td style="padding:8px;">{{ isset($item->roles) && $item->roles ? $item->roles->pluck('nama_role')->join(', ') : '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
