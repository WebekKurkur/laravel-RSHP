@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
  <div class="card mb-4">
    <div class="card-header"><div class="card-title">Tambah Rekam Medis</div></div>

    <form action="{{ route('perawat.rekam-medis.store') }}" method="POST">
      @csrf

      <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row mb-3">
          <label for="idreservasi_dokter" class="col-sm-2 col-form-label">Temu Dokter</label>
          <div class="col-sm-10">
            <select name="idreservasi_dokter" id="idreservasi_dokter" class="form-control @error('idreservasi_dokter') is-invalid @enderror">
              <option value="">-- pilih --</option>
              @foreach($temus as $t)
                <option value="{{ $t->idreservasi_dokter }}"
                        data-dokter-id="{{ $t->roleUser && $t->roleUser->user ? $t->roleUser->user->iduser : '' }}"
                        data-dokter-nama="{{ $t->roleUser && $t->roleUser->user ? e($t->roleUser->user->nama) : '' }}">
                  #{{ $t->idreservasi_dokter }} - {{ $t->pet->nama ?? 'Pet' }} - {{ $t->waktu_daftar }}
                </option>
              @endforeach
            </select>
            @error('idreservasi_dokter')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="created_at" class="col-sm-2 col-form-label">Tanggal / Waktu</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-text" id="created_at_picker" style="cursor:pointer;"><i class="bi bi-calendar-event"></i></span>
              <input type="datetime-local" name="created_at" id="created_at" class="form-control @error('created_at') is-invalid @enderror" value="{{ old('created_at') }}">
            </div>
            @error('created_at')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="anamnesa" class="col-sm-2 col-form-label">Anamnesa</label>
          <div class="col-sm-10">
            <textarea name="anamnesa" id="anamnesa" class="form-control">{{ old('anamnesa') }}</textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="temuan_klinis" class="col-sm-2 col-form-label">Temuan Klinis</label>
          <div class="col-sm-10">
            <textarea name="temuan_klinis" id="temuan_klinis" class="form-control">{{ old('temuan_klinis') }}</textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
          <div class="col-sm-10">
            <textarea name="diagnosa" id="diagnosa" class="form-control">{{ old('diagnosa') }}</textarea>
          </div>
        </div>

        <!-- Perawat tidak perlu menambah detail tindakan di form ini; dokter akan menambahnya pada tampilan detail rekam medis -->

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-warning">Simpan</button>
        <a href="{{ route('perawat.rekam-medis.index') }}" class="btn float-end">Batal</a>
      </div>

    </form>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // calendar icon: open native picker or focus input
    const createdAtInput = document.getElementById('created_at');
    const createdAtPicker = document.getElementById('created_at_picker');
    if (createdAtPicker && createdAtInput) {
      createdAtPicker.addEventListener('click', function () {
        try {
          if (typeof createdAtInput.showPicker === 'function') {
            createdAtInput.showPicker();
          } else {
            createdAtInput.focus();
          }
        } catch (e) {
          createdAtInput.focus();
        }
      });
    }
  });
</script>
@endpush

@endsection
