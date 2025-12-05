<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $items = Kategori::all();
        return view('admin.kategori.index', compact('items'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategori($request);

        $kategori = $this->createKategori($validated);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    protected function validateKategori(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:kategori,nama_kategori,' . $id . ',idkategori' : 'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori' => ['required','string','min:3','max:255',$uniqueRule],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.min' => 'Nama kategori minimal 3 karakter.',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.',
        ]);
    }

    protected function createKategori(array $data)
    {
        try {
            return Kategori::create([
                'nama_kategori' => $this->formatNama($data['nama_kategori']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kategori: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id)
    {
        $item = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Kategori::findOrFail($id);
        $validated = $this->validateKategori($request, $id);

        try {
            $item->nama_kategori = $this->formatNama($validated['nama_kategori']);
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui kategori: ' . $e->getMessage());
        }

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
}
