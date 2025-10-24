<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function homeindex() {
        return view('site.home');
    }

    public function layananindex() {
        return view('site.layanan');
    }

    public function strukturindex() {
        return view('site.struktur');
    }

    public function VMindex() {
        return view('site.visiMisi');
    }
}