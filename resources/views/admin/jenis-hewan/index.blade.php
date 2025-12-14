@extends('layouts.lte.main')

@section('content')
<br>
  <div class="container">
    <main>
      <h1>Admin - Daftar Jenis Hewan</h1>
      <p>
        <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-primary" style="display:inline-block;margin-left:10px;margin-bottom:10px;">Tambah Jenis</a>
      </p>
    </main>

    @if(isset($items) && count($items))
      <div class="card mb-4">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
              <thead class="table-light">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Nama Jenis Hewan</th>
                  <th style="width: 140px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $i => $item)
                  <tr class="align-middle {{ isset($item) && method_exists(
                    $item, 'trashed') && $item->trashed() ? 'table-secondary text-muted' : '' }}">
                    <td>{{ $i + 1 }}.</td>
                    <td>{{ $item->nama_jenis_hewan ?? $item->name ?? '-' }}</td>
                    <td>
                      <div class="d-flex gap-2 align-items-center">
                        @if(method_exists($item, 'trashed') && $item->trashed())
                          <form action="{{ route('admin.jenis-hewan.restore', $item->idjenis_hewan ?? $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-success" onclick="return confirm('Restore jenis hewan ini?')">Restore</button>
                          </form>

                          <form action="{{ route('admin.jenis-hewan.forceDelete', $item->idjenis_hewan ?? $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus permanen? Ini akan menghapus data selamanya. Yakin?')">Hapus Permanen</button>
                          </form>
                        @else
                          <a href="{{ route('admin.jenis-hewan.edit', $item->idjenis_hewan ?? $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <form action="{{ route('admin.jenis-hewan.destroy', $item->idjenis_hewan ?? $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus jenis hewan ini?')">Hapus</button>
                          </form>
                        @endif
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
