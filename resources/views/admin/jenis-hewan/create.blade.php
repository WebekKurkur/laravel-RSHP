@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Tambah Jenis Hewan</h1>

    <form action="{{ route('admin.jenis-hewan.store') }}" method="POST">
      @csrf

      <div style="margin-bottom:8px;">
        <label for="nama_jenis_hewan">Nama Jenis Hewan</label><br>
        <input type="text" name="nama_jenis_hewan" id="nama_jenis_hewan" value="{{ old('nama_jenis_hewan') }}" style="width:100%; padding:8px;">
        @error('nama_jenis_hewan')
          <div style="color:red; margin-top:4px;">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn">Simpan</button>
      <a href="{{ route('admin.jenis-hewan.index') }}" class="btn" style="margin-left:8px;">Batal</a>
    </form>
  </div>
@endsection
