<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {return view('welcome');});
Route::get('/contacUs', function () {return view('contacUs'); });
Route::get('/aboutUs', function () {return view('aboutUs'); });
Route::get('/welcome', function () {return view('welcome'); });
Route::get('/riwayat', function () {return view('riwayat'); });
Route::get('/service', function () {return view('service'); });

Route::get('/contacUs2', function () {return view('contacUs2'); });
Route::get('/aboutUs2', function () {return view('aboutUs2'); });
Route::get('/welcome2', function () {return view('welcome2'); });
Route::get('/riwayat2', function () {return view('riwayat2'); });
Route::get('/service2', function () {return view('service2'); });



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
