<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitsController;
use App\Http\Controllers\HabitsHistoryController;
use App\Http\Controllers\AchievementsController;
use App\Models\Streak;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $streak = Streak::where('user_id', auth()->id())
                ->max('current_streak') ?? 0;
    return view('main', compact('streak'));
})->name('main')->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login-form')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register-form')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('/habits', [HabitsController::class, 'create'])->name('create-habit')->middleware('auth');
Route::post('/habits', [HabitsController::class, 'store'])->name('create')->middleware('auth');
Route::delete('/habits/{habit}', [HabitsController::class, 'destroy'])->name('habits.destroy')->middleware('auth');
Route::post('/habits/{habitId}/complete', [HabitsHistoryController::class, 'store'])->name('habits.complete')->middleware('auth');
Route::patch('/habits/{habit}', [HabitsController::class, 'update'])->name('habits.update')->middleware('auth');
Route::get('/habits/{habit}/edit', [HabitsController::class, 'edit'])->name('habits.edit')->middleware('auth');

# Route::post('/habits/{habit}/complete', [HabitsHistoryController::class, 'store'])->name('habits.complete')->middleware('auth');

Route::get('/achievemnts', [AchievementsController::class, 'create'])->name('achievements')->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth')->middleware('auth');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::patch('admin/users/{user}', [AdminController::class, 'update'])->name('admin.update')->middleware('auth');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.delete')->middleware('auth');


