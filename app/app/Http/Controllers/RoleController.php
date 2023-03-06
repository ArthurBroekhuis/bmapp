<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(): view
    {
        $roles = Role::all();
        return view('roles/roles', ['roles' => $roles]);
    }
    public function create(): view
    {
        $roles = Role::all();
        return view('roles/create', ['roles' => $roles]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Role::create([
            'name' => $request->name,
        ]);
        return redirect('/roles');
    }
}
