@extends('layouts.lte.main')

@section('content')
 
  <div class="container">
    <h1>Daftar Pet</h1>
    <div class="mb-3">
    </div>
    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width:10px">ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Pemilik</th>
                <th>Ras</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->idpet ?? $item->id }}</td>
                  <td>{{ $item->nama ?? '-' }}</td>
                  <td>{{ $item->tanggal_lahir ?? '-' }}</td>
                  <td>{{ $item->pemilik->idpemilik ?? '-' }}</td>
                  <td>{{ $item->ras->nama_ras ?? '-' }}</td>
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
