<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function koneksi() 
    {
        try {
            \DB::connection()->getPdo();
            return 'koneksi gacor';
        } catch (\Exception $e) {
            return 'koneksi ga gacor ' . $e->getMessage();
        }
    }

    public function index() 
    {
        return view('site.home');
    }

    public function layanan()
    {
        return view('site.layanan');
    }

    public function visi()
    {
        return view('site.visi');
    }

    public function struktur()
    {
        return view('site.struktur');
    }
}
