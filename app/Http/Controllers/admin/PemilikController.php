<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('items'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePemilik($request);

        $pemilik = $this->createPemilik($validated);

        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik berhasil ditambahkan.');
    }

    protected function validatePemilik(Request $request, $id = null)
    {
        return $request->validate([
            'no_wa' => ['required','string','max:45'],
            'alamat' => ['nullable','string','max:100'],
            'iduser' => ['required','integer'],
        ], [
            'no_wa.required' => 'No WA wajib diisi.',
            'iduser.required' => 'User harus dipilih.',
        ]);
    }

    protected function createPemilik(array $data)
    {
        try {
            return Pemilik::create([
                'no_wa' => trim($data['no_wa']),
                'alamat' => isset($data['alamat']) ? trim($data['alamat']) : null,
                'iduser' => $data['iduser'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan pemilik: ' . $e->getMessage());
        }
    }
}
