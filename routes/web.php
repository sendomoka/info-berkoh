<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

// Public Routes
Route::get('/', function () {
    return view('public.beranda');
});

Route::get('/berita', function () {
    return view('public.berita');
});

Route::get('/datapenduduk', function () {
    return view('public.datapenduduk');
});

Route::get('/kontak', function () {
    return view('public.kontak');
});

Route::get('/laporan', function () {
    return view('public.laporan');
});

Route::get('/tentang', function () {
    return view('public.tentang');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->middleware('useraccess:admin');
        Route::get('/petugas', [AdminController::class, 'petugas'])->middleware('useraccess:petugas');
        Route::prefix('users')->group(function () {
            Route::get('/', function () {
                return view('admin.users.index');
            });

            Route::get('/create', function () {
                return view('admin.users.create');
            });

            Route::get('/edit', function () {
                return view('admin.users.edit');
            });
        });

        // Repeat similar route definitions for other admin sections
        // Example: berita, datapenduduk, galeri, informasiumum, laporan
    });
});