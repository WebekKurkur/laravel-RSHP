<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $items = Pet::with('pemilik','ras')->get();
        return view('admin.pet.index', compact('items'));
    }

    public function create()
    {
        $pemilik = Pemilik::all();
        $ras = RasHewan::all();
        return view('admin.pet.create', compact('pemilik','ras'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePet($request);

        $pet = $this->createPet($validated);

        return redirect()->route('admin.pet.index')->with('success', 'Pet berhasil ditambahkan.');
    }

    protected function validatePet(Request $request, $id = null)
    {
        return $request->validate([
            'nama' => ['required','string','max:100'],
            'tanggal_lahir' => ['nullable','date'],
            'warna_tanda' => ['nullable','string','max:45'],
            'jenis_kelamin' => ['nullable','string','max:1'],
            'idpemilik' => ['required','integer'],
            'idras_hewan' => ['required','integer'],
        ], [
            'nama.required' => 'Nama hewan wajib diisi.',
            'idpemilik.required' => 'Pemilik harus dipilih.',
            'idras_hewan.required' => 'Ras harus dipilih.',
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            return Pet::create([
                'nama' => trim($data['nama']),
                'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
                'warna_tanda' => $data['warna_tanda'] ?? null,
                'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
                'idpemilik' => $data['idpemilik'],
                'idras_hewan' => $data['idras_hewan'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan pet: ' . $e->getMessage());
        }
    }
}
