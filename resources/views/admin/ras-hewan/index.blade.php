@extends('layouts.lte.main')

@section('content')
  <br>
  <div class="container">
    <h1>Daftar Ras Hewan</h1>
    <div class="mb-3">
      <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-primary">Tambah Ras</a>
    </div>
    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nama Ras</th>
                <th>Jenis Hewan</th>
                <th style="width: 140px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle {{ $item->trashed() ? 'table-secondary text-muted' : '' }}">
                  <td>{{ $item->idras_hewan ?? $item->id }}</td>
                  <td>{{ $item->nama_ras ?? '-' }}</td>
                  <td>{{ $item->jenis->nama_jenis_hewan ?? '-' }}</td>
                  <td>
                    <div class="d-flex gap-2 align-items-center">
                      @if($item->trashed())
                        <form action="{{ route('admin.ras-hewan.restore', $item->idras_hewan ?? $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          <button class="btn btn-sm btn-success" onclick="return confirm('Restore ras hewan ini?')">Restore</button>
                        </form>

                        <form action="{{ route('admin.ras-hewan.forceDelete', $item->idras_hewan ?? $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus permanen? Ini akan menghapus data selamanya. Yakin?')">Hapus Permanen</button>
                        </form>
                      @else
                        <a href="{{ route('admin.ras-hewan.edit', $item->idras_hewan ?? $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.ras-hewan.destroy', $item->idras_hewan ?? $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus ras hewan ini?')">Hapus</button>
                        </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <x-slot name="footer">
          @if(method_exists($items, 'links'))
            {{ $items->links() }}
          @endif
        </x-slot>
      </x-admin-index-card>
    @else
      <p>Tidak ada data untuk ditampilkan.</p>
    @endif
  </div>
@endsection
