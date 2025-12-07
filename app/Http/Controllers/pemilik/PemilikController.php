<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\RekamMedis;
use App\Models\TemuDokter;

class PemilikController extends Controller
{
    public function pets()
    {
        $pemilik = $this->currentPemilik();

        try {
            $pets = $pemilik ? $pemilik->pets()->with('ras')->get() : collect();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data hewan: ' . $e->getMessage());
        }

        return view('pemilik.pets.index', compact('pets'));
    }

    public function rekamMedis()
    {
        $pemilik = $this->currentPemilik();

        try {
            $items = collect();
            if ($pemilik) {
                $items = RekamMedis::with(['temuDokter.pet', 'detail.kode'])
                    ->whereHas('temuDokter.pet', function ($q) use ($pemilik) {
                        $q->where('idpemilik', $pemilik->idpemilik);
                    })->get();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat rekam medis: ' . $e->getMessage());
        }

        return view('pemilik.rekam-medis.index', compact('items'));
    }

    public function reservations()
    {
        $pemilik = $this->currentPemilik();

        try {
            $reservations = $pemilik ? TemuDokter::with(['pet', 'roleUser.user'])
                ->whereHas('pet', function ($q) use ($pemilik) {
                    $q->where('idpemilik', $pemilik->idpemilik);
                })->get() : collect();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat reservasi: ' . $e->getMessage());
        }

        return view('pemilik.reservations.index', compact('reservations'));
    }
    public function show($id)
    {
        $pemilik = $this->currentPemilik();

        try {
            $item = RekamMedis::with(['temuDokter.pet', 'detail.kode', 'temuDokter.roleUser.user'])->findOrFail($id);

            // ownership check: the temuDokter->pet->idpemilik must match
            if (! $pemilik || ! $item->temuDokter || ! $item->temuDokter->pet || $item->temuDokter->pet->idpemilik != $pemilik->idpemilik) {
                return redirect()->route('pemilik.rekam-medis.index')->with('error', 'Anda tidak memiliki akses ke rekam medis ini.');
            }
        } catch (\Exception $e) {
            return redirect()->route('pemilik.rekam-medis.index')->with('error', 'Gagal memuat data rekam medis: ' . $e->getMessage());
        }

        return view('pemilik.rekam-medis.show', compact('item'));
    }

    protected function currentPemilik()
    {
        $userId = auth()->user()->iduser ?? null;
        if (! $userId) return null;

        return Pemilik::where('iduser', $userId)->first();
    }
}
