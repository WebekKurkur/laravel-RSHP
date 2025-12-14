@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Detail Rekam Medis #{{ $item->idrekam_medis }}</div>

                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Temu Dokter</th>
                                    <td>#{{ $item->idreservasi_dokter }} @if($item->temuDokter && $item->temuDokter->pet) - {{ $item->temuDokter->pet->nama }} @endif</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $item->created_at ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Anamnesa</th>
                                    <td>{{ $item->anamnesa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Temuan Klinis</th>
                                    <td>{{ $item->temuan_klinis ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Diagnosa</th>
                                    <td>{{ $item->diagnosa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Dokter Pemeriksa</th>
                                    <td>@if($item->temuDokter && $item->temuDokter->roleUser && $item->temuDokter->roleUser->user){{ $item->temuDokter->roleUser->user->nama }}@else - @endif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">Detail Tindakan</div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:60px">ID</th>
                                            <th>Kode</th>
                                            <th>Deskripsi</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($item->detail && $item->detail->count())
                                            @foreach($item->detail as $d)
                                                <tr class="align-middle">
                                                    <td>{{ $d->iddetail_rekam_medis ?? '-' }}</td>
                                                    <td>{{ $d->kode ? $d->kode->kode : $d->idkode_tindakan_terapi }}</td>
                                                    <td>{{ $d->kode ? $d->kode->deskripsi_tindakan_terapi : '-' }}</td>
                                                    <td>{{ $d->detail ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">Tidak ada detail tindakan.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        <div class="mb-3">
                            <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
