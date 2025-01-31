<?php

use App\Http\Controllers\DashboardControllerUser;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\FotoPropiedadController;
use App\Http\Controllers\NotificacionController;
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

Route::get('/dashboard', [DashboardControllerUser::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/propiedad/detalle/{id}', [DashboardControllerUser::class, 'detalle'])->name('usuario.propiedad.detalle');

Route::middleware('auth')->group(function () {
    Route::post('/favoritos', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
});

//para las notificaciones

Route::middleware(['auth'])->group(function () {
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/notificaciones/marcar-leidas', [NotificacionController::class, 'marcarComoLeidas'])->name('notificaciones.leidas');
});

// Ruta protegida para vendedores
// Route::middleware(AuthenticateVendedor::class)->group(function () {
//     Route::get('/vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
// });

// Rutas de autenticación para vendedores
Route::get('vendedor/register', [VendedorRegisterController::class, 'showRegisterForm'])->name('vendedor.register');
Route::post('vendedor/register', [VendedorRegisterController::class, 'register'])->name('vendedor.register.submit');

Route::get('vendedor/login', [VendedorLoginController::class, 'showLoginForm'])->name('vendedor.login');
Route::post('vendedor/login', [VendedorLoginController::class, 'login'])->name('vendedor.login.submit');

// Logout
Route::post('/vendedor/logout', [VendedorLoginController::class, 'logout'])->name('vendedor.logout');

Route::middleware(AuthenticateVendedor::class)->prefix('vendedor')->group(function () {
    // Mostrar listado de propiedades
    //Route::get('propiedades', [VendedorController::class, 'listarPropiedades'])->name('vendedor.propiedad');
    Route::get('/vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
    // Mostrar formulario para crear una propiedad
    Route::get('propiedades/create', [VendedorController::class, 'crearPropiedad'])->name('vendedor.propiedad.create');

    // Guardar una propiedad
    Route::post('propiedades', [VendedorController::class, 'guardarPropiedad'])->name('vendedor.propiedad.store');

    // Mostrar formulario para editar una propiedad
    Route::get('propiedades/{id}/edit', [VendedorController::class, 'editarPropiedad'])->name('vendedor.propiedad.edit');

    // Actualizar una propiedad
    Route::put('propiedades/{id}', [VendedorController::class, 'actualizarPropiedad'])->name('vendedor.propiedad.update');

    // Eliminar propiedad
    Route::delete('propiedades/{id}', [VendedorController::class, 'eliminarPropiedad'])->name('vendedor.propiedad.destroy');
});

//rutas para fotos
Route::get('/fotos', [FotoPropiedadController::class, 'index'])->name('fotos.index');
Route::post('/fotos', [FotoPropiedadController::class, 'store'])->name('fotos.store');
Route::delete('/fotos/{id}', [FotoPropiedadController::class, 'destroy'])->name('fotos.destroy');

//rutas por defecto para users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
