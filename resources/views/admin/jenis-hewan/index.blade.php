@extends('layouts.app')

@section('content')

  <div class="container">
    <main>
      <h1>Admin - Daftar Jenis Hewan</h1>
      <p>
        <a href="{{ route('admin.dashboard-admin') }}" class="btn" style="display:inline-block;margin-bottom:10px;">Kembali ke Dashboard</a>
        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn" style="display:inline-block;margin-left:10px;margin-bottom:10px;">Tambah Jenis</a>
      </p>
    </main>

    @if(isset($items) && count($items))
      <table style="width:100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #eee; text-align: left;">
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Nama Jenis Hewan</th>
            <th style="padding:8px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td style="padding:8px;">{{ $item->idjenis_hewan ?? $item->id }}</td>
              <td style="padding:8px;">{{ $item->nama_jenis_hewan ?? $item->name ?? '-' }}</td>
              <td style="padding:8px;">
                <a href="{{ route('admin.jenis-hewan.edit', $item->idjenis_hewan ?? $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.jenis-hewan.destroy', $item->idjenis_hewan ?? $item->id) }}" method="POST" style="display:inline-block; margin-left:6px;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus jenis hewan ini?')">Hapus</button>
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
