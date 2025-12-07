@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
        <div class="card mb-4">
            <div class="card-header"><div class="card-title">Edit Ras Hewan</div></div>
            <form action="{{ route('admin.ras-hewan.update', $item->idras_hewan ?? $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="idjenis_hewan" class="col-sm-2 col-form-label">Jenis Hewan</label>
                        <div class="col-sm-10">
                            <select name="idjenis_hewan" id="idjenis_hewan" class="form-control @error('idjenis_hewan') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis --</option>
                                    @foreach($jenis as $j)
                                            <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan', $item->idjenis_hewan) == $j->idjenis_hewan ? 'selected' : '' }}>{{ $j->nama_jenis_hewan }}</option>
                                    @endforeach
                            </select>
                            @error('idjenis_hewan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama_ras" class="col-sm-2 col-form-label">Nama Ras</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ras" id="nama_ras" class="form-control @error('nama_ras') is-invalid @enderror" value="{{ old('nama_ras', $item->nama_ras) }}">
                            @error('nama_ras') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                    <a href="{{ route('admin.ras-hewan.index') }}" class="btn float-end">Batal</a>
                </div>
            </form>
        </div>
</div>
@endsection
