<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\Api\PemesananApiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;



Route::get('/', function () {return view('welcome');});
Route::get('/contacUs', function () {return view('contacUs'); });
Route::get('/aboutUs', function () {return view('aboutUs'); });
Route::get('/welcome', function () {return view('welcome'); });
Route::get('/riwayat', function () {return view('riwayat'); });
Route::get('/service', function () {return view('service'); });


Route::get('/admin', [OrderController::class, 'index'])->name('admin');

Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan', [PemesananController::class, 'index']);

Route::get('/pemesanan', [PemesananApiController::class, 'index']);




// Halaman utama / welcome (bisa diubah sesuai kebutuhan)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard — hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil (contoh kalau kamu mau user bisa edit profil)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengikutsertakan route auth (login, register, logout) dari Breeze
require __DIR__.'/auth.php';


// Login dan Logout
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/konfirmasi/{id}', [AdminDashboardController::class, 'konfirmasi'])->name('admin.konfirmasi');

// Route yang hanya bisa diakses setelah login admin
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::post('/admin/pemesanan/konfirmasi/{id}', [AdminController::class, 'konfirmasi'])->name('admin.konfirmasi');
// });
