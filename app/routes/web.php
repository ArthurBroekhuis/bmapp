<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Roles Routes //
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/roles',[ RoleController::class, 'index' ])->name('roles');
    Route::get('/roles/create', [ RoleController::class, 'create' ]);
    Route::put('/roles', [ RoleController::class, 'store' ])->name('roles');
    Route::get('/roles/delete', [ RoleController::class, 'delete' ]);
});

// End roles routes //

// Users Routes //
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users',[ UserController::class, 'index' ])->name('users');
    Route::get('/users/delete', [ UserController::class, 'delete' ]);

    Route::get('users/new', [UserController::class, 'create'])->name('register');
    Route::post('users/new', [UserController::class, 'store']);

    Route::get('users/new/info', [UserController::class, 'create_info'])->name('register-info');
    Route::post('users/new/info', [UserController::class, 'store_info']);
});

// End users routes //


// Standard laravel breeze routes //
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
