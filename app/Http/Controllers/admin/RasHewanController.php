<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $items = RasHewan::with('jenis')->get();
        return view('admin.ras-hewan.index', compact('items'));
    }
}
