<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;

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
        return view('dokter.rekam-medis.show', compact('item'));
    }
}
