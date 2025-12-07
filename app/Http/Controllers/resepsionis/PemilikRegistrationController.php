<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;

class PemilikRegistrationController extends Controller
{
    public function create()
    {
        return view('resepsionis.pemilik.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatePemilik($request);

        try {
            $user = User::create([
                'nama' => $this->formatNamaPemilik($data['nama']),
                'email' => $this->formatEmail($data['email']),
                'password' => Hash::make($data['password']),
            ]);

            try {
                RoleUser::create([
                    'idrole' => 5,
                    'iduser' => $user->iduser ?? $user->id,
                    'status' => 1,
                ]);
            } catch (\Exception $e) {
                
            }

            Pemilik::create([
                'nama' => $this->formatNamaPemilik($data['nama']),
                'alamat' => $data['alamat'] ?? null,
                'no_wa' => $data['no_wa'] ?? null,
                'iduser' => $user->iduser ?? $user->id,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan pemilik: ' . $e->getMessage());
        }

        return redirect()->route('resepsionis.pemilik.register')->with('success', 'Registrasi pemilik berhasil.');
    }


    protected function validatePemilik(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:200|unique:user,email',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string|max:1000',
            'no_wa' => 'nullable|string|max:50',
        ]);
    }

    protected function formatNamaPemilik($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

    protected function formatEmail($email)
    {
        return trim(strtolower($email));
    }
}