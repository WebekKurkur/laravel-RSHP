<?php
namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\DB;

class PemilikDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->iduser ?? null;
        $reservations = collect();

        if ($userId) {
            $pemilik = Pemilik::where('iduser', $userId)->first();
            if ($pemilik) {
                $petIds = DB::table('pet')->where('idpemilik', $pemilik->idpemilik)->pluck('idpet')->toArray();
                if (! empty($petIds)) {
                    $ids = DB::table('temu_dokter')->whereIn('idpet', $petIds)->orderBy('waktu_daftar', 'desc')->pluck('idtemu_dokter')->toArray();
                    $reservations = $ids ? TemuDokter::with(['pet','roleUser.user'])->whereIn('idtemu_dokter', $ids)->get() : collect();
                }
            }
        }

        return view('pemilik.dashboard-pemilik', compact('reservations'));
    }
}
