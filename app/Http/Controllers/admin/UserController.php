<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::with(['roles','roleUser'])->get();
        return view('admin.user.index', compact('items'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateUser($request);

        $user = $this->createUser($validated);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $this->validateUser($request, $id);

        try {
            $user->nama = $this->formatNama($validated['nama']);
            $user->email = trim(strtolower($validated['email']));
            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui user: ' . $e->getMessage());
        }

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function resetPassword($id)
    {
        $user = User::find($id);
        if (! $user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $user->password = Hash::make('password');
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Password user telah di-reset ke default.');
    }

    protected function validateUser(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:user,email,' . $id . ',iduser' : 'unique:user,email';

        return $request->validate([
            'nama' => ['required','string','min:3','max:500'],
            'email' => ['required','email','max:200',$uniqueRule],
            'password' => [$id ? 'nullable' : 'required','string','min:6','max:300'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
        ]);
    }

    protected function createUser(array $data)
    {
        try {
            return User::create([
                'nama' => trim($data['nama']),
                'email' => trim(strtolower($data['email'])),
                'password' => Hash::make($data['password']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan user: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
