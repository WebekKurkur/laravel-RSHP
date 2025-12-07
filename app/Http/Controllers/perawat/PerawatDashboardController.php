<?php
namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerawatDashboardController extends Controller
{
    public function index()
    {
        return view('perawat.dashboard-perawat');
    }
}
