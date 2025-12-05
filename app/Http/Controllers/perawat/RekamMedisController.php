<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\TemuDokter;
use App\Models\KodeTindakanTerapi;
use App\Models\DetailRekamMedis;

class RekamMedisController extends Controller
{
    public function index()
    {
        $items = RekamMedis::with(['temuDokter', 'detail.kode'])->get();
        return view('perawat.rekam-medis.index', compact('items'));
    }

    public function create()
    {
        
        $temus = TemuDokter::with(['pet', 'roleUser.user'])->get();
        $kodes = KodeTindakanTerapi::all();
        return view('perawat.rekam-medis.create', compact('temus', 'kodes'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRekamMedis($request);

        try {
            $rekam = $this->createRekamMedis($validated);

            if ($request->has('details') && is_array($request->input('details'))) {
                foreach ($request->input('details') as $d) {
                    if (empty($d['idkode_tindakan_terapi'])) continue;
                    DetailRekamMedis::create([
                        'idrekam_medis' => $rekam->idrekam_medis,
                        'idkode_tindakan_terapi' => $d['idkode_tindakan_terapi'],
                        'detail' => $this->formatText($d['detail'] ?? null),
                    ]);
                }
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan rekam medis: ' . $e->getMessage());
        }

        return redirect()->route('perawat.rekam-medis.index')
                         ->with('success', 'Rekam medis berhasil disimpan.');
    }

    protected function createRekamMedis(array $data)
    {
        try {
            
            $dokterRoleUserId = null;
            $temu = TemuDokter::with('roleUser')->find($data['idreservasi_dokter']);
            if ($temu && $temu->roleUser) {
                $dokterRoleUserId = $temu->roleUser->idrole_user;
            }

            return RekamMedis::create([
                'idreservasi_dokter' => $data['idreservasi_dokter'],
                'created_at' => $data['created_at'] ?? now(),
                'anamnesa' => $this->formatText($data['anamnesa'] ?? null),
                'temuan_klinis' => $this->formatText($data['temuan_klinis'] ?? null),
                'diagnosa' => $this->formatText($data['diagnosa'] ?? null),
                'dokter_pemeriksa' => $dokterRoleUserId,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan rekam medis: ' . $e->getMessage());
        }
    }

    protected function validateRekamMedis(Request $request, $id = null)
    {
        $rules = [
            'idreservasi_dokter' => 'required|integer|exists:temu_dokter,idreservasi_dokter',
            'created_at' => 'nullable|date',
            'anamnesa' => 'nullable|string|max:1000',
            'temuan_klinis' => 'nullable|string|max:1000',
            'diagnosa' => 'nullable|string|max:1000',
            'details' => 'nullable|array',
            'details.*.idkode_tindakan_terapi' => 'nullable|integer|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'details.*.detail' => 'nullable|string|max:1000',
        ];

        $messages = [
            'idreservasi_dokter.required' => 'Pilih temu dokter terlebih dahulu.',
            'idreservasi_dokter.exists' => 'Data temu dokter tidak ditemukan.',
            'created_at.date' => 'Format tanggal tidak valid.',
        ];

        return $request->validate($rules, $messages);
    }

    protected function formatText($value)
    {
        return $value === null ? null : trim($value);
    }

    public function show($id)
    {
        $item = RekamMedis::with(['temuDokter.roleUser.user', 'detail.kode'])->findOrFail($id);
        $kodes = KodeTindakanTerapi::all();
        return view('perawat.rekam-medis.show', compact('item', 'kodes'));
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
                DetailRekamMedis::create([
                    'idrekam_medis' => $rekam->idrekam_medis,
                    'idkode_tindakan_terapi' => $d['idkode_tindakan_terapi'],
                    'detail' => $this->formatText($d['detail'] ?? null),
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('perawat.rekam-medis.show', $id)->with('error', 'Gagal menambah detail: ' . $e->getMessage());
        }

        return redirect()->route('perawat.rekam-medis.show', $id)->with('success', 'Detail rekam medis berhasil ditambahkan.');
    }

    // public function edit($id)
    // {
    //     $item = RekamMedis::findOrFail($id);
    //     $pets = Pet::all();
    //     $temus = TemuDokter::all();
    //     return view('perawat.rekam-medis.edit', compact('item', 'pets', 'temus'));
    // }

    public function update(Request $request, $id)
    {
        $item = RekamMedis::findOrFail($id);
        $validated = $this->validateRekamMedis($request, $id);

        try {
            $item->idpet = $validated['idpet'];
            $item->idreservasi_dokter = $validated['idreservasi_dokter'] ?? null;
            $item->tanggal = $validated['tanggal'];
            $item->keluhan = $this->formatText($validated['keluhan'] ?? null);
            $item->diagnosa = $this->formatText($validated['diagnosa'] ?? null);
            $item->tindakan = $this->formatText($validated['tindakan'] ?? null);
            $item->terapi = $this->formatText($validated['terapi'] ?? null);
            $item->catatan = $this->formatText($validated['catatan'] ?? null);
            $item->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui rekam medis: ' . $e->getMessage());
        }

        return redirect()->route('perawat.rekam-medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = RekamMedis::find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Data rekam medis tidak ditemukan.');
        }
        $item->delete();
        return redirect()->route('perawat.rekam-medis.index')->with('success', 'Rekam medis dihapus.');
    }
}
