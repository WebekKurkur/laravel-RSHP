@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Rekam Medis #{{ $item->idrekam_medis }}</div>

                <div class="card-body">
                    <p><strong>Temu Dokter:</strong> #{{ $item->idreservasi_dokter }} @if($item->temuDokter && $item->temuDokter->pet) - {{ $item->temuDokter->pet->nama }} @endif</p>
                    <p><strong>Tanggal:</strong> {{ $item->created_at }}</p>
                    <p><strong>Anamnesa:</strong><br>{{ $item->anamnesa }}</p>
                    <p><strong>Temuan Klinis:</strong><br>{{ $item->temuan_klinis }}</p>
                    <p><strong>Diagnosa:</strong><br>{{ $item->diagnosa }}</p>
                    <p><strong>Dokter Pemeriksa:</strong>
                        @if($item->temuDokter && $item->temuDokter->roleUser && $item->temuDokter->roleUser->user)
                            {{ $item->temuDokter->roleUser->user->nama }}
                        @else
                            -
                        @endif
                    </p>

                    <hr>
                    <h5>Detail Tindakan</h5>
                    @if($item->detail && $item->detail->count())
                        <ul>
                            @foreach($item->detail as $d)
                                <li>
                                    {{ $d->kode ? ($d->kode->kode . ' - ' . $d->kode->deskripsi_tindakan_terapi) : ('Kode: ' . $d->idkode_tindakan_terapi) }}
                                    @if($d->detail) - {{ $d->detail }} @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Tidak ada detail tindakan.</p>
                    @endif

                    <hr>
                    <h5>Tambah Detail Rekam Medis</h5>
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('perawat.rekam-medis.detail.store', $item->idrekam_medis) }}">
                        @csrf
                        <div id="detail-add-container">
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
                            <button type="button" id="add-detail-btn" class="btn btn-secondary">Tambah Detail</button>
                            <button class="btn btn-primary">Simpan Detail</button>
                            <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-link">Kembali</a>
                            <a href="{{ route('perawat.dashboard-perawat') }}" class="btn btn-secondary ms-2">Kembali ke Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        let idx = document.querySelectorAll('#detail-add-container .detail-row').length;
        const addBtn = document.getElementById('add-detail-btn');
        const container = document.getElementById('detail-add-container');

        if(addBtn && container){
            addBtn.addEventListener('click', function(){
                const template = document.querySelector('#detail-add-container .detail-row');
                if(!template) return;
                const row = template.cloneNode(true);
                row.querySelectorAll('select, input, textarea').forEach(function(el){
                    if(el.name){
                        el.name = el.name.replace(/details\[\d+\]/, 'details['+idx+']');
                    }
                    if(el.tagName.toLowerCase() === 'input' || el.tagName.toLowerCase() === 'textarea') el.value = '';
                    if(el.tagName.toLowerCase() === 'select') el.selectedIndex = 0;
                });
                container.appendChild(row);
                idx++;
            });
        }

        if(container){
            container.addEventListener('click', function(e){
                if(e.target.classList.contains('remove-detail')){
                    const rows = container.querySelectorAll('.detail-row');
                    if(rows.length > 1){
                        e.target.closest('.detail-row').remove();
                    }
                }
            });
        }
    });
</script>
@endpush
