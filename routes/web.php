<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    echo 'hola';
});

Route::get('/login', [SessionController::class, 'create'])->name('login-form')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'create'])->name('register-form')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
