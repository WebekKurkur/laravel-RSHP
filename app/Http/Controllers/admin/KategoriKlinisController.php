<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $items = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('items'));
    }

    public function create()
    {
        return view('admin.kategori-klinis.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategoriKlinis($request);

        $kategori = $this->createKategoriKlinis($validated);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil ditambahkan.');
    }

    protected function validateKategoriKlinis(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis' : 'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis' => ['required','string','min:3','max:255',$uniqueRule],
        ], [
            'nama_kategori_klinis.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori_klinis.string' => 'Nama kategori klinis harus berupa teks.',
            'nama_kategori_klinis.min' => 'Nama kategori klinis minimal 3 karakter.',
            'nama_kategori_klinis.max' => 'Nama kategori klinis maksimal 255 karakter.',
            'nama_kategori_klinis.unique' => 'Nama kategori klinis sudah ada.',
        ]);
    }

    protected function createKategoriKlinis(array $data)
    {
        try {
            return KategoriKlinis::create([
                'nama_kategori_klinis' => $this->formatNama($data['nama_kategori_klinis']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kategori klinis: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
