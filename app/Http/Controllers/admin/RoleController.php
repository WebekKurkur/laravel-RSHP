<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $items = Role::all();
        return view('admin.role.index', compact('items'));
    }
}
