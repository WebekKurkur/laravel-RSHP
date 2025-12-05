<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    public function index()
    {
        $items = RoleUser::with(['user','role'])->get();
        $users = User::all();
        $roles = Role::all();

        return view('admin.role-user.index', compact('items','users','roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'iduser' => ['required','integer'],
            'idrole' => ['required','integer'],
            'status' => ['nullable','in:0,1'],
        ]);

        // prevent duplicate assignment
        $exists = RoleUser::where('iduser', $data['iduser'])->where('idrole', $data['idrole'])->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'User sudah memiliki role tersebut.');
        }

        RoleUser::create([
            'iduser' => $data['iduser'],
            'idrole' => $data['idrole'],
            'status' => isset($data['status']) ? $data['status'] : 1,
        ]);

        return redirect()->route('admin.role-user.index')->with('success', 'Role berhasil diberikan ke user.');
    }

    public function destroy($id)
    {
        $item = RoleUser::find($id);
        if (! $item) {
            return redirect()->back()->with('error', 'Role assignment tidak ditemukan.');
        }
        $item->delete();
        return redirect()->route('admin.role-user.index')->with('success', 'Role assignment dihapus.');
    }
}
