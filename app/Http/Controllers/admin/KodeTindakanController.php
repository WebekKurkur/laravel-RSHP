<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KodeTindakanController extends Controller
{
    public function index()
    {
        $items = KodeTindakanTerapi::with('kategori','kategoriKlinis')->get();
        return view('admin.kode-tindakan-terapi.index', compact('items'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.create', compact('kategori','kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateKodeTindakan($request);

        $kode = $this->createKodeTindakan($validated);

        return redirect()->route('admin.kode-tindakan-terapi.index')->with('success', 'Kode tindakan terapi berhasil ditambahkan.');
    }

    protected function validateKodeTindakan(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi' : 'unique:kode_tindakan_terapi,kode';

        return $request->validate([
            'kode' => ['required','string','min:1','max:50',$uniqueRule],
            'deskripsi_tindakan_terapi' => ['nullable','string','max:1000'],
            'idkategori' => ['required','integer'],
            'idkategori_klinis' => ['required','integer'],
        ], [
            'kode.required' => 'Kode wajib diisi.',
            'kode.unique' => 'Kode sudah ada.',
            'idkategori.required' => 'Kategori harus dipilih.',
            'idkategori_klinis.required' => 'Kategori klinis harus dipilih.',
        ]);
    }

    protected function createKodeTindakan(array $data)
    {
        try {
            return KodeTindakanTerapi::create([
                'kode' => strtoupper(trim($data['kode'])),
                'deskripsi_tindakan_terapi' => isset($data['deskripsi_tindakan_terapi']) ? trim($data['deskripsi_tindakan_terapi']) : null,
                'idkategori' => $data['idkategori'],
                'idkategori_klinis' => $data['idkategori_klinis'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kode tindakan terapi: ' . $e->getMessage());
        }
    }
}
