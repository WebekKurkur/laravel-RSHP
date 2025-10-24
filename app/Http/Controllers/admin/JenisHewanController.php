<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index() {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenisHewan.index', compact('jenisHewan'));
    }
};
