@extends('layouts.lte.main')

@section('content')

  <div class="container">
    <main>
      <h1>Admin - Daftar Pemilik</h1>
      <div class="mb-3">
    </main>

    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width:10px">ID</th>
                <th>No WA</th>
                <th>Alamat</th>
                <th>User ID</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->idpemilik ?? $item->id }}</td>
                  <td>{{ $item->no_wa ?? '-' }}</td>
                  <td>{{ $item->alamat ?? '-' }}</td>
                  <td>{{ $item->iduser ?? '-' }}</td>
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
