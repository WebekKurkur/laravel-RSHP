<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\RasHewan;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $pemilikCount = Pemilik::count();
        $petCount = Pet::count();
        $rasCount = RasHewan::count();

        return view('admin.dashboard-admin', compact('usersCount', 'pemilikCount', 'petCount', 'rasCount'));
    }
}
