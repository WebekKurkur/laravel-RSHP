@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
    <h1>Manajemen Role - Assign Role ke User</h1>

    <div class="mb-3">
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header"><div class="card-title">Tambah Role ke User</div></div>
        <form action="{{ route('admin.role-user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <label for="iduser" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <select name="iduser" id="iduser" class="form-control @error('iduser') is-invalid @enderror">
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $u)
                                <option value="{{ $u->iduser }}">{{ $u->nama }} ({{ $u->email }})</option>
                            @endforeach
                        </select>
                        @error('iduser') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="idrole" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="idrole" id="idrole" class="form-control @error('idrole') is-invalid @enderror">
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $r)
                                <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                            @endforeach
                        </select>
                        @error('idrole') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Tambah</button>
                <a href="{{ route('admin.role-user.index') }}" class="btn float-end">Batal</a>
            </div>
        </form>
    </div>

        <h5>Daftar Assignment Role</h5>
        @if(isset($items) && count($items))
            <x-admin-index-card>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th style="width:140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $it)
                            <tr class="align-middle">
                                    <td>{{ $it->idrole_user }}</td>
                                    <td>{{ $it->user ? $it->user->nama . ' (' . $it->user->email .')' : $it->iduser }}</td>
                                    <td>{{ $it->role ? $it->role->nama_role : $it->idrole }}</td>
                                    <td>{{ $it->status ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                            <form action="{{ route('admin.role-user.destroy', $it->idrole_user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus assignment ini?')">Hapus</button>
                                            </form>
                                            </div>
                                        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-slot name="footer">
                    @if(method_exists($items, 'links'))
                        {{ $items->links() }}
                    @endif
                </x-slot>
            </x-admin-index-card>
        @else
            <p>Tidak ada data untuk ditampilkan.</p>
        @endif
</div>
@endsection
