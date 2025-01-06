<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorAuthController;
use App\Http\Controllers\OperatorController;
use App\Http\Middleware\OperatorMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AjuanBantuanController;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/profil', [OperatorAuthController::class, 'showUserProfile'])->name('profil');


Route::get('/operator/login', [OperatorAuthController::class, 'showLoginForm'])->name('operator.LoginForm');
Route::post('/operator/login', [OperatorAuthController::class, 'login'])->name('operator.login');
Route::get('/operator/register', [OperatorAuthController::class, 'showRegisterForm'])->name('operator.registerForm');
Route::post('/operator/register', [OperatorAuthController::class, 'register'])->name('operator.register');
Route::get('/logout', [OperatorAuthController::class, 'logout'])->name('operator.logout');
Route::get('/operator/bantuan', [OperatorAuthController::class, 'showBantuanForm'])->name('operator.bantuanForm');
Route::post('/operator/bantuan', [OperatorAuthController::class, 'storeBantuan'])->name('operator.storeBantuan');
Route::get('/operator/bantuan/form', [OperatorAuthController::class, 'showInboxForm'])->name('inbox_bantuan');

Route::middleware('auth:operator')->group(function () {
    Route::get('/profile', [OperatorAuthController::class, 'showUserProfile'])->name('profil');
    Route::post('/profile', [OperatorAuthController::class, 'updateUserProfile'])->name('pupdate');
});

// Route for the landing page (for level 1 users)
Route::get('/', function () {
    return view('frontpage.landingpage');
})->name('landing');

// Route for the operator dashboard (for level 2 operators)
Route::get('operator/daftarkeluarga', function () {
    return view('operatorr.daftarkeluarga');
})->name('operator.daftarkeluarga');


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
