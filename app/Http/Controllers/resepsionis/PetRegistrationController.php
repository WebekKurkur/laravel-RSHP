<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetRegistrationController extends Controller
{
    public function create()
    {
        $pemilik = Pemilik::all();
        $ras = RasHewan::with('jenis')->get();
        return view('resepsionis.pet.create', compact('pemilik','ras'));
    }

    public function store(Request $request)
    {
        $data = $this->validatePet($request);

        try {
            $jk = $this->normalizeJenisKelamin($data['jenis_kelamin'] ?? null);

            Pet::create([
                'nama' => $this->formatNamaPet($data['nama']),
                'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
                'warna_tanda' => $data['warna_tanda'] ?? null,
                'jenis_kelamin' => $jk ?? null,
                'idpemilik' => $data['idpemilik'],
                'idras_hewan' => $data['idras_hewan'],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data pet: ' . $e->getMessage());
        }

        return redirect()->route('resepsionis.pet.register')->with('success', 'Pet berhasil didaftarkan.');
    }


    protected function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|min:1|max:255',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:L,P,jantan,betina',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);
    }

    protected function normalizeJenisKelamin($jk)
    {
        if (! $jk) return null;
        $jk = strtolower($jk);
        if ($jk === 'jantan' || $jk === 'l') {
            return 'L';
        }
        if ($jk === 'betina' || $jk === 'p') {
            return 'P';
        }
        return strtoupper(substr($jk, 0, 1));
    }

    protected function formatNamaPet($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}