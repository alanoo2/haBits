<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

Route::get('/', [SessionController::class, 'create'])->name('login-form')->middleware('guest');

Route::get('/register', [RegisterController::class, 'create'])->name('register-form')->middleware('guest');

