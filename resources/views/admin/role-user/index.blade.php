@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Role - Assign Role ke User</h1>

    <div class="mb-3">
        <a href="{{ route('admin.dashboard-admin') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5>Tambah Role ke User</h5>
            <form action="{{ route('admin.role-user.store') }}" method="POST" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-4">
                    <label for="iduser" class="form-label">User</label>
                    <select name="iduser" id="iduser" class="form-control">
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $u)
                            <option value="{{ $u->iduser }}">{{ $u->nama }} ({{ $u->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="idrole" class="form-label">Role</label>
                    <select name="idrole" id="idrole" class="form-control">
                        <option value="">-- Pilih Role --</option>
                        @foreach($roles as $r)
                            <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <h5>Daftar Assignment Role</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $it)
            <tr>
                <td>{{ $it->idrole_user }}</td>
                <td>{{ $it->user ? $it->user->nama . ' (' . $it->user->email .')' : $it->iduser }}</td>
                <td>{{ $it->role ? $it->role->nama_role : $it->idrole }}</td>
                <td>{{ $it->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <form action="{{ route('admin.role-user.destroy', $it->idrole_user) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus assignment ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
