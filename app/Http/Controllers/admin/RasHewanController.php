<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function index()
    {
        
        $items = RasHewan::withTrashed()->with('jenis')->get();
        return view('admin.ras-hewan.index', compact('items'));
    }

    public function create()
    {
        $jenis = JenisHewan::all();
        return view('admin.ras-hewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRasHewan($request);

        $ras = $this->createRasHewan($validated);

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil ditambahkan.');
    }

    protected function validateRasHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan' : 'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => ['required','string','min:3','max:255',$uniqueRule],
            'idjenis_hewan' => ['required','integer'],
        ], [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'nama_ras.string' => 'Nama ras harus berupa teks.',
            'nama_ras.min' => 'Nama ras minimal 3 karakter.',
            'nama_ras.max' => 'Nama ras maksimal 255 karakter.',
            'nama_ras.unique' => 'Nama ras sudah ada.',
            'idjenis_hewan.required' => 'Jenis hewan harus dipilih.',
        ]);
    }

    protected function createRasHewan(array $data)
    {
        try {
            return RasHewan::create([
                'nama_ras' => $this->formatNama($data['nama_ras']),
                'idjenis_hewan' => $data['idjenis_hewan'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data ras hewan: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id)
    {
        $item = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();
        return view('admin.ras-hewan.edit', compact('item','jenis'));
    }

    public function update(Request $request, $id)
    {
        $item = RasHewan::findOrFail($id);
        $validated = $this->validateRasHewan($request, $id);

        try {
            $item->nama_ras = $this->formatNama($validated['nama_ras']);
            $item->idjenis_hewan = $validated['idjenis_hewan'];
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui ras hewan: ' . $e->getMessage());
        }

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = RasHewan::find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Ras hewan tidak ditemukan.');
        }
        $item->delete();
        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan dihapus.');
    }

    public function restore($id)
    {
        $item = RasHewan::withTrashed()->find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Ras hewan tidak ditemukan.');
        }

        try {
            $item->restore();
            // optional: clear deleted_by after restore
            if (isset($item->deleted_by)) {
                $item->deleted_by = null;
                $item->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal merestore: ' . $e->getMessage());
        }

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan berhasil direstore.');
    }

    public function forceDelete($id)
    {
        $item = RasHewan::withTrashed()->find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Ras hewan tidak ditemukan.');
        }

        try {
            $item->forceDelete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus permanen: ' . $e->getMessage());
        }

        return redirect()->route('admin.ras-hewan.index')->with('success', 'Ras hewan dihapus permanen.');
    }
}
