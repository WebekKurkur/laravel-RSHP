<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Dokter;
use App\Models\Perawat;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function createDokter()
    {
        return view('admin.dokter.create');
    }

    public function storeDokter(Request $request)
    {
        return $this->storeWithRole($request, 'dokter');
    }

    public function createPerawat()
    {
        return view('admin.perawat.create');
    }

    public function storePerawat(Request $request)
    {
        return $this->storeWithRole($request, 'perawat');
    }

    protected function storeWithRole(Request $request, $roleName)
    {
        // base validation
        $rules = [
            'nama' => ['required','string','min:3','max:500'],
            'email' => ['required','email','max:200','unique:user,email'],
            'password' => ['required','string','min:6','max:300'],
        ];

        // role-specific validation rules
        if (strtolower($roleName) === 'dokter') {
            $rules = array_merge($rules, [
                'alamat' => ['nullable','string','max:100'],
                'no_hp' => ['nullable','string','max:45'],
                'bidang_dokter' => ['nullable','string','max:100'],
                'jenis_kelamin' => ['nullable','in:M,F,m,f,1,0'],
            ]);
        } elseif (strtolower($roleName) === 'perawat') {
            $rules = array_merge($rules, [
                'alamat' => ['nullable','string','max:100'],
                'no_hp' => ['nullable','string','max:45'],
                'jenis_kelamin' => ['nullable','in:M,F,m,f,1,0'],
                'pendidikan' => ['nullable','string','max:100'],
            ]);
        }

        $validated = $request->validate($rules, [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
        ]);

        try {
            $user = User::create([
                'nama' => trim($validated['nama']),
                'email' => trim(strtolower($validated['email'])),
                'password' => Hash::make($validated['password']),
            ]);

            $role = Role::whereRaw('LOWER(nama_role) = ?', [strtolower($roleName)])->first();
            if (! $role) {
                return redirect()->back()->with('error', "Role '$roleName' belum ada. Silakan tambahkan role terlebih dahulu.");
            }

            RoleUser::create([
                'idrole' => $role->idrole,
                'iduser' => $user->iduser,
                'status' => 1,
            ]);

            // insert into role-specific table
            if (strtolower($roleName) === 'dokter') {
                Dokter::create([
                    'alamat' => $validated['alamat'] ?? null,
                    'no_hp' => $validated['no_hp'] ?? null,
                    'bidang_dokter' => $validated['bidang_dokter'] ?? null,
                    'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                    'id_user' => $user->iduser,
                ]);
            } elseif (strtolower($roleName) === 'perawat') {
                Perawat::create([
                    'alamat' => $validated['alamat'] ?? null,
                    'no_hp' => $validated['no_hp'] ?? null,
                    'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                    'pendidikan' => $validated['pendidikan'] ?? null,
                    'id_user' => $user->iduser,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan user: ' . $e->getMessage());
        }

        return redirect()->route('admin.user.index')->with('success', ucfirst($roleName) . ' berhasil ditambahkan dan role terpasang.');
    }
}
