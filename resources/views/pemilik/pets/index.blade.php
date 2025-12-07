@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hewan Peliharaan Saya</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($pets->isEmpty())
                        <p class="mb-0">Anda belum memiliki hewan peliharaan terdaftar.</p>
                    @else
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis</th>
                                    <th>Ras</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pets as $p)
                                    <tr>
                                        <td>{{ $p->idpet }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->tanggal_lahir }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->ras->nama_ras }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('pemilik.dashboard-pemilik') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
