<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorAuthController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OperatorMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [UserController::class, 'index'])->name('landing');

Route::prefix('/')->group(function () {
    Route::resource('user', UserController::class);
});



Route::get('/operator/login', [OperatorAuthController::class, 'showLoginForm'])->name('operator.LoginForm');
Route::post('/operator/login', [OperatorAuthController::class, 'login'])->name('operator.login');

Route::middleware([OperatorMiddleware::class])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.daftarkeluarga');
    Route::resource('operator', OperatorController::class);
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
