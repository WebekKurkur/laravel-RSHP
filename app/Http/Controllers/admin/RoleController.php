<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $items = Role::all();
        return view('admin.role.index', compact('items'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRole($request);

        $role = $this->createRole($validated);

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    protected function validateRole(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:role,nama_role,' . $id . ',idrole' : 'unique:role,nama_role';

        return $request->validate([
            'nama_role' => ['required','string','min:3','max:100',$uniqueRule],
        ], [
            'nama_role.required' => 'Nama role wajib diisi.',
            'nama_role.unique' => 'Nama role sudah ada.',
        ]);
    }

    protected function createRole(array $data)
    {
        try {
            return Role::create([
                'nama_role' => trim($data['nama_role']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan role: ' . $e->getMessage());
        }
    }
}
