<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendedor\AuthController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateVendedor;
use App\Http\Controllers\Vendedor\Auth\RegisterController as VendedorRegisterController;
use App\Http\Controllers\Vendedor\Auth\LoginController as VendedorLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Ruta protegida para vendedores
Route::middleware(AuthenticateVendedor::class)->group(function () {
    Route::get('/vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
});

// Rutas de autenticación para vendedores
Route::get('vendedor/register', [VendedorRegisterController::class, 'showRegisterForm'])->name('vendedor.register');
Route::post('vendedor/register', [VendedorRegisterController::class, 'register'])->name('vendedor.register.submit');

Route::get('vendedor/login', [VendedorLoginController::class, 'showLoginForm'])->name('vendedor.login');
Route::post('vendedor/login', [VendedorLoginController::class, 'login'])->name('vendedor.login.submit');

// Logout
Route::post('/vendedor/logout', [VendedorLoginController::class, 'logout'])->name('vendedor.logout');

//rutas por defecto para users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
