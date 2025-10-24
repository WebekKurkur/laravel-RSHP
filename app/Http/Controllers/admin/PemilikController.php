<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pemilik;

class PemilikController extends Controller
{
    public function index() {
        $pemilik = Pemilik::all();
        return view('admin.pemilik.index', compact('pemilik'));
    }
}
// view belom ada