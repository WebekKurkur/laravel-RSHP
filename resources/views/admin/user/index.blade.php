@extends('layouts.lte.main')

@section('content')
<br>
  <div class="container">
    <main>
      <h1>Admin - Daftar Users</h1>
      <div class="mb-3">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
      </div>
    </main>

    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Roles</th>
                <th style="width: 160px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->iduser ?? $item->id }}</td>
                  <td>{{ $item->nama ?? $item->name ?? '-' }}</td>
                  <td>{{ $item->email ?? '-' }}</td>
                  <td>{{ isset($item->roles) && $item->roles ? $item->roles->pluck('nama_role')->join(', ') : '-' }}</td>
                  <td>
                    <div class="d-flex gap-2 align-items-center">
                      <a href="{{ route('admin.user.edit', $item->iduser ?? $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('admin.user.reset', $item->iduser ?? $item->id) }}" method="POST" class="d-inline">
                        @csrf
                      </form>
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
