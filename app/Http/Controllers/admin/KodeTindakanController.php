<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;

class KodeTindakanController extends Controller
{
    public function index()
    {
        $items = KodeTindakanTerapi::with('kategori','kategoriKlinis')->get();
        return view('admin.kode-tindakan-terapi.index', compact('items'));
    }
}
