<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $items = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('items'));
    }
}
