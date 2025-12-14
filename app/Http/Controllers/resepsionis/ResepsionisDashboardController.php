<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\DB;

class ResepsionisDashboardController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal');
        $showAll = $request->query('all') == '1';
        $order = $request->query('order', 'desc') === 'asc' ? 'asc' : 'desc';

        $qb = DB::table('temu_dokter')->select('temu_dokter.idreservasi_dokter');

        if (!$showAll) {
            if ($tanggal) {
                $qb->whereDate('temu_dokter.waktu_daftar', $tanggal);
            } else {
                $qb->whereDate('temu_dokter.waktu_daftar', now()->format('Y-m-d'));
            }
        }

        if ($order === 'asc') {
            $qb->orderBy('temu_dokter.waktu_daftar')->orderBy('temu_dokter.no_urut');
        } else {
            $qb->orderByDesc('temu_dokter.waktu_daftar')->orderBy('temu_dokter.no_urut');
        }

        if (!$showAll) {
            $qb->limit(10);
        }

        $ids = $qb->pluck('idreservasi_dokter')->toArray();
        $items = $ids ? TemuDokter::with(['pet', 'roleUser.user'])->whereIn('idreservasi_dokter', $ids)->get() : collect();

        return view('resepsionis.dashboard-resepsionis', compact('items', 'tanggal', 'showAll', 'order'));
    }
}
