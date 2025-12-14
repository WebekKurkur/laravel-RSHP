<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\RasHewan;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $usersCount = DB::table('user')->count();
        $pemilikCount = DB::table('pemilik')->count();
        $petCount = DB::table('pet')->count();
        $rasCount = DB::table('ras_hewan')->count();

        return view('admin.dashboard-admin', compact('usersCount', 'pemilikCount', 'petCount', 'rasCount'));
    }
}
