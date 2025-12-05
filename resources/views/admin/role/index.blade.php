@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Daftar Role</h1>
    <div class="mb-3">
      <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
      <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Tambah Role</a>
    </div>
    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background:#eee">
            <th style="padding:8px">ID</th>
            <th style="padding:8px">Nama Role</th>
            <th style="padding:8px">Users Count</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px">{{ $item->idrole ?? $item->id }}</td>
              <td style="padding:8px">{{ $item->nama_role ?? '-' }}</td>
              <td style="padding:8px">{{ isset($item->users) ? count($item->users) : '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
