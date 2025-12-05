@extends('layouts.app')

@section('content')
  <div class="container">
    <main>
      <h1>Admin - Daftar Users</h1>
      <div class="mb-3">
        <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
      </div>
    </main>

    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #eee; text-align: left;">
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Nama</th>
            <th style="padding:8px;">Email</th>
            <th style="padding:8px;">Roles</th>
            <th style="padding:8px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px;">{{ $item->iduser ?? $item->id }}</td>
              <td style="padding:8px;">{{ $item->nama ?? $item->name ?? '-' }}</td>
              <td style="padding:8px;">{{ $item->email ?? '-' }}</td>
              <td style="padding:8px;">{{ isset($item->roles) && $item->roles ? $item->roles->pluck('nama_role')->join(', ') : '-' }}</td>
              <td style="padding:8px;">
                <a href="{{ route('admin.user.edit', $item->iduser ?? $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.user.reset', $item->iduser ?? $item->id) }}" method="POST" style="display:inline-block; margin-left:6px;">
                  @csrf
                  <button class="btn btn-sm btn-warning" onclick="return confirm('Reset password ke default untuk user ini?')">Reset Password</button>
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
