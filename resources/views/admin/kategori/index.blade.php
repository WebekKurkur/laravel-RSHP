@extends('layouts.lte.main')

@section('content')
<br>
  
  <div class="container">
    <h1>Daftar Kategori</h1>
      <div class="mb-3">
      <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>
    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width:10px">ID</th>
                <th>Nama Kategori</th>
                <th style="width:140px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->idkategori ?? $item->id }}</td>
                  <td>{{ $item->nama_kategori ?? '-' }}</td>
                  <td>
                    <a href="{{ route('admin.kategori.edit', $item->idkategori ?? $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
