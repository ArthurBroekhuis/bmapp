<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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
