<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login_form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login_form');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('adminlte::page');
    })->name('admin');

    Route::prefix('admins')->group(function () {
        Route::prefix('laravel-filemanager')->group(function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
        Route::get('/', [AdminController::class, 'index'])->name('admins.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
        Route::put('/{admin}', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    });
});

