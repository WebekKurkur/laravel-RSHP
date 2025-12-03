<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $items = Pet::with('pemilik','ras')->get();
        return view('admin.pet.index', compact('items'));
    }
}
