@extends('layouts.lte.main')

@section('content')
<br>
  <div class="container">
    <h1>Daftar Role</h1>
    <div class="mb-3">
      <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Tambah Role</a>
    </div>
    @if(isset($items) && count($items))
      <x-admin-index-card>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nama Role</th>
                <th>Users Count</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr class="align-middle">
                  <td>{{ $item->idrole ?? $item->id }}</td>
                  <td>{{ $item->nama_role ?? '-' }}</td>
                  <td>{{ isset($item->users) ? count($item->users) : '-' }}</td>
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
