@extends('layouts.lte.main')

@section('content')
<br>
    <div class="container">
        <main>
            <h1>Hewan Peliharaan Saya</h1>
        </main>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($pets->isEmpty())
            <p class="mb-0">Anda belum memiliki hewan peliharaan terdaftar.</p>
        @else
            <div class="card mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis</th>
                                    <th>Ras</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pets as $p)
                                    <tr class="align-middle">
                                        <td>{{ $p->idpet }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->tanggal_lahir }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->ras->nama_ras ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
