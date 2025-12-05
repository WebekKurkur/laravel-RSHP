<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis-hewan.create');
    }


    public function store(Request $request)
    {
        $validated = $this->validateJenisHewan($request);

        $jenisHewan = $this->createJenisHewan($validated);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    protected function validateJenisHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan' : 'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
            'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks.',
            'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal 255 karakter.',
            'nama_jenis_hewan.min' => 'Nama jenis hewan minimal 3 karakter.',
            'nama_jenis_hewan.unique' => 'Nama jenis hewan sudah ada.',
        ]);
    }

    protected function createJenisHewan(array $data)
    {
        try {
            return JenisHewan::create([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data jenis hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id)
    {
        $item = JenisHewan::findOrFail($id);
        return view('admin.jenis-hewan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = JenisHewan::findOrFail($id);
        $validated = $this->validateJenisHewan($request, $id);

        try {
            $item->nama_jenis_hewan = $this->formatNamaJenisHewan($validated['nama_jenis_hewan']);
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui jenis hewan: ' . $e->getMessage());
        }

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = JenisHewan::find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Jenis hewan tidak ditemukan.');
        }
        $item->delete();
        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan dihapus.');
    }
}

