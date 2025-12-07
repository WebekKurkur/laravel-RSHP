<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;

class ResepsionisDashboardController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal');
        $showAll = $request->query('all') == '1';
        $order = $request->query('order', 'desc') === 'asc' ? 'asc' : 'desc';

        $query = TemuDokter::with(['pet', 'roleUser.user']);

        // If user chose to show all, ignore date filtering (show from earliest record).
        if (!$showAll) {
            if ($tanggal) {
                $query->whereDate('waktu_daftar', $tanggal);
            } else {
                // default to today's date so dashboard shows today's registrations
                $query->whereDate('waktu_daftar', now()->format('Y-m-d'));
            }
        }

        if ($order === 'asc') {
            $query->orderBy('waktu_daftar')->orderBy('no_urut');
        } else {
            $query->orderByDesc('waktu_daftar')->orderBy('no_urut');
        }

        if (!$showAll) {
            $query->limit(10);
        }

        $items = $query->get();

        return view('resepsionis.dashboard-resepsionis', compact('items', 'tanggal', 'showAll', 'order'));
    }
}
