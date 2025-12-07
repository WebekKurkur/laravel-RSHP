@extends('layouts.lte.main')

@section('content')
<br>
  <div class="container">
      <div class="card mb-4">
      <div class="card-header"><div class="card-title">Edit Jenis Hewan</div></div>
      <!--begin::Form-->
      <form action="{{ route('admin.jenis-hewan.update', $item->idjenis_hewan ?? $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!--begin::Body-->
        <div class="card-body">
          <div class="row mb-3">
            <label for="nama_jenis_hewan" class="col-sm-2 col-form-label">Nama Jenis Hewan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('nama_jenis_hewan') is-invalid @enderror" id="nama_jenis_hewan" name="nama_jenis_hewan" value="{{ old('nama_jenis_hewan', $item->nama_jenis_hewan) }}" />
              @error('nama_jenis_hewan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
          <button type="submit" class="btn btn-warning">Simpan</button>
          <a href="{{ route('admin.jenis-hewan.index') }}" class="btn float-end">Batal</a>
        </div>
        <!--end::Footer-->
      </form>
      <!--end::Form-->
    </div>
  </div>
@endsection
