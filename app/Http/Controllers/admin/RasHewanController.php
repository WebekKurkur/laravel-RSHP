<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index() {
        $rasHewan = RasHewan::all();
        return view('admin.RasHewan.index', compact('rasHewan'));
    }
}
