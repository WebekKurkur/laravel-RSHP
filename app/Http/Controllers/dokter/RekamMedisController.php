<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;

class RekamMedisController extends Controller
{
    public function index()
    {
        $items = RekamMedis::with(['temuDokter', 'detail.kode'])->get();
        return view('dokter.rekam-medis.index', compact('items'));
    }

    public function show($id)
    {
        $item = RekamMedis::with(['temuDokter.roleUser.user', 'detail.kode'])->findOrFail($id);
        $kodes = KodeTindakanTerapi::all();
        return view('dokter.rekam-medis.show', compact('item', 'kodes'));
    }

    public function storeDetail(Request $request, $id)
    {
        $rekam = RekamMedis::findOrFail($id);

        $validated = $request->validate([
            'details' => 'required|array',
            'details.*.idkode_tindakan_terapi' => 'required|integer|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'details.*.detail' => 'nullable|string|max:1000',
        ], [
            'details.required' => 'Tidak ada detail yang dikirim.',
            'details.*.idkode_tindakan_terapi.required' => 'Pilih kode tindakan untuk setiap baris detail.',
        ]);

        try {
            foreach ($validated['details'] as $d) {
                if (empty($d['idkode_tindakan_terapi'])) continue;
                \App\Models\DetailRekamMedis::create([
                    'idrekam_medis' => $rekam->idrekam_medis,
                    'idkode_tindakan_terapi' => $d['idkode_tindakan_terapi'],
                    'detail' => $this->formatText($d['detail'] ?? null),
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dokter.rekam-medis.show', $id)->with('error', 'Gagal menambah detail: ' . $e->getMessage());
        }

        return redirect()->route('dokter.rekam-medis.show', $id)->with('success', 'Detail rekam medis berhasil ditambahkan.');
    }

    protected function formatText($value)
    {
        return $value === null ? null : trim($value);
    }
}
