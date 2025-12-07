<?php
namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilikDashboardController extends Controller
{
    public function index()
    {
        return view('pemilik.dashboard-pemilik');
    }
}
