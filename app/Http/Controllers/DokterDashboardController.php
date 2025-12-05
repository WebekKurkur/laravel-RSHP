<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DokterDashboardController extends Controller
{
    public function index()
    {
        if (view()->exists('dokter.dashboard-dokter')) {
            return view('dokter.dashboard-dokter');
        }
        return response('Dokter dashboard placeholder');
    }
}
