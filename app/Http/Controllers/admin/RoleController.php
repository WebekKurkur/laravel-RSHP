<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;
class RoleController extends Controller
{
    public function index() {
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }
}
