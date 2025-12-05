@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Isi Rekam Medis</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('perawat.rekam-medis.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="idreservasi_dokter" class="form-label">Temu Dokter</label>
                            <select name="idreservasi_dokter" id="idreservasi_dokter" class="form-control">
                                <option value="">-- pilih --</option>
                                @foreach($temus as $t)
                                    <option value="{{ $t->idreservasi_dokter }}"
                                            data-dokter-id="{{ $t->roleUser && $t->roleUser->user ? $t->roleUser->user->iduser : '' }}"
                                            data-dokter-nama="{{ $t->roleUser && $t->roleUser->user ? e($t->roleUser->user->nama) : '' }}">
                                        #{{ $t->idreservasi_dokter }} - {{ $t->pet->nama ?? 'Pet' }} - {{ $t->waktu_daftar }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idreservasi_dokter')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Tanggal / Waktu</label>
                            <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="{{ old('created_at') }}">
                            @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="anamnesa" class="form-label">Anamnesa</label>
                            <textarea name="anamnesa" id="anamnesa" class="form-control">{{ old('anamnesa') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="temuan_klinis" class="form-label">Temuan Klinis</label>
                            <textarea name="temuan_klinis" id="temuan_klinis" class="form-control">{{ old('temuan_klinis') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <textarea name="diagnosa" id="diagnosa" class="form-control">{{ old('diagnosa') }}</textarea>
                        </div>

                        <hr>
                        <h5>Detail Rekam Medis</h5>
                        <div id="details-container">
                            <div class="detail-row row mb-2">
                                <div class="col-md-6">
                                    <select name="details[0][idkode_tindakan_terapi]" class="form-control">
                                        <option value="">-- pilih kode tindakan --</option>
                                        @foreach($kodes as $k)
                                            <option value="{{ $k->idkode_tindakan_terapi }}">{{ $k->kode }} - {{ $k->deskripsi_tindakan_terapi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="details[0][detail]" class="form-control" placeholder="detail (opsional)">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm remove-detail">-</button>
                                </div>
                            </div>
                        </div>
                       

                        <div class="mb-3">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-link">Batal</a>
                            <a href="{{ route('perawat.dashboard-perawat') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
     document.addEventListener('DOMContentLoaded', function () {
        let idx = document.querySelectorAll('.detail-row').length;
        const selectTemu = document.getElementById('idreservasi_dokter');
        const dokterNameSpan = document.getElementById('dokter_name_display');
        const addDetailBtn = document.getElementById('add-detail');
        const detailsContainer = document.getElementById('details-container');

        function applySelectedDokter(){
            if(!selectTemu) return;
            const opt = selectTemu.options[selectTemu.selectedIndex];
            if(!opt) return;
            const dokterNama = opt.dataset.dokterNama || '';
            if(dokterNameSpan) dokterNameSpan.textContent = dokterNama || '-';
        }

        // initial apply
        applySelectedDokter();

        if(selectTemu){
            selectTemu.addEventListener('change', applySelectedDokter);
        }

        if(addDetailBtn && detailsContainer){
            addDetailBtn.addEventListener('click', function(){
                const templateRow = document.querySelector('.detail-row');
                if(!templateRow) return;
                const row = templateRow.cloneNode(true);

                // update inputs/select names and clear values
                row.querySelectorAll('select, input, textarea').forEach(function(el){
                    if(el.name){
                        el.name = el.name.replace(/details\[\d+\]/, 'details['+idx+']');
                    }
                    if(el.tagName.toLowerCase() === 'input' || el.tagName.toLowerCase() === 'textarea'){
                        el.value = '';
                    } else if(el.tagName.toLowerCase() === 'select'){
                        el.selectedIndex = 0;
                    }
                });

                // append and increment index
                detailsContainer.appendChild(row);
                idx++;
            });
        }

        // event delegation for remove buttons
        if(detailsContainer){
            detailsContainer.addEventListener('click', function(e){
                if(e.target.classList.contains('remove-detail')){
                    const rows = detailsContainer.querySelectorAll('.detail-row');
                    if(rows.length > 1){
                        e.target.closest('.detail-row').remove();
                    }
                }
            });
        }
    });
</script>
@endpush

@endsection
