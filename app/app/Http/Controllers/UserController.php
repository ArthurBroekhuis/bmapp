<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_info;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Role as RoleModel;

class UserController extends Controller
{
    public function index(): view
    {
        $users = User::all();
        $roles = Role::all();
        return view('users/users', ['roles' => $roles, 'users' => $users]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $colors = array("red", "blue", "black", "green", "orange",);
        $icon = array_rand($colors, 2);
        $name = $request->name;
        $icon_letter = $name[0];
        $icon_letter = strtoupper($icon_letter);
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'icon_color' => $colors[$icon[0]],
            'icon' => $icon_letter,
            'is_active' => 'Active',
        ]);

        event(new Registered($user));

        return redirect('/users/new/info');
    }

    public function create_info(): View
    {
        return view('users.create_info');
    }

    public function store_info(Request $request): RedirectResponse
    {
        $request->validate([
            'color' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
        ]);

        User_info::create([
            'user_id' => DB::table('users')->max('id'),
            'color' => $request->color,
            'job' => $request->job,
        ]);


        return redirect('/users');
    }
}
