<?php
namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;

class DokterDashboardController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal');
        $showAll = $request->query('all') == '1';
        $order = $request->query('order', 'desc') === 'asc' ? 'asc' : 'desc';

        $qb = DB::table('rekam_medis')->select('rekam_medis.idrekam_medis');

        if (! $showAll) {
            if ($tanggal) {
                $qb->whereDate('rekam_medis.created_at', $tanggal);
            } else {
                $qb->whereDate('rekam_medis.created_at', now()->format('Y-m-d'));
            }
        }

        if ($order === 'asc') {
            $qb->orderBy('rekam_medis.created_at');
        } else {
            $qb->orderByDesc('rekam_medis.created_at');
        }

        if (! $showAll) {
            $qb->limit(10);
        }

        $ids = $qb->pluck('idrekam_medis')->toArray();

        $items = $ids ? RekamMedis::with(['temuDokter.pet', 'temuDokter.roleUser.user', 'detail.kode'])->whereIn('idrekam_medis', $ids)->get() : collect();

        return view('dokter.dashboard-dokter', compact('items', 'tanggal', 'showAll', 'order'));
    }
}
