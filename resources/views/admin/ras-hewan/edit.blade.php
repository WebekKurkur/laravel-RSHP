@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Ras Hewan</h1>

    <form action="{{ route('admin.ras-hewan.update', $item->idras_hewan ?? $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="idjenis_hewan">Jenis Hewan</label>
            <select name="idjenis_hewan" id="idjenis_hewan" class="form-control">
                <option value="">-- Pilih Jenis --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan', $item->idjenis_hewan) == $j->idjenis_hewan ? 'selected' : '' }}>{{ $j->nama_jenis_hewan }}</option>
                @endforeach
            </select>
            @error('idjenis_hewan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="nama_ras">Nama Ras</label>
            <input type="text" name="nama_ras" id="nama_ras" class="form-control" value="{{ old('nama_ras', $item->nama_ras) }}">
            @error('nama_ras') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
