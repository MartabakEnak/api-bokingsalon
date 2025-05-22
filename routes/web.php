<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::get('/contacUs', function () {return view('contacUs'); });
Route::get('/aboutUs', function () {return view('aboutUs'); });
Route::get('/welcome', function () {return view('welcome'); });
Route::get('/riwayat', function () {return view('riwayat'); });
Route::get('/service', function () {return view('service'); });

