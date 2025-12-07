@extends('layouts.lte.main')

@section('content')
 <br>
  <div class="container">
    <h1>Daftar Kode Tindakan Terapi</h1>
    <div class="mb-3">
      <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-primary">Tambah Kode Tindakan</a>
    </div>
    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width:10px">ID</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Kategori Klinis</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->idkode_tindakan_terapi ?? $item->id }}</td>
                  <td>{{ $item->kode ?? '-' }}</td>
                  <td>{{ $item->deskripsi_tindakan_terapi ?? '-' }}</td>
                  <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                  <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
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
