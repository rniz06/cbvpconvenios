<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Modulo Convenios
    |--------------------------------------------------------------------------
    */
    Route::controller(ConvenioController::class)->group(function () {
        Route::get('convenios', 'index')->name('convenios.index');
        Route::get('convenios/create', 'create')->name('convenios.create');
        Route::post('convenios/store', 'store')->name('convenios.store');
        Route::get('convenios/{convenio}', 'show')->name('convenios.show');
        Route::get('convenios/{convenio}/edit', 'edit')->name('convenios.edit');
        Route::put('convenios/{convenio}', 'update')->name('convenios.update');
        Route::delete('convenios/{convenio}', 'destroy')->name('convenios.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Usuario
    |--------------------------------------------------------------------------
    */
    // Route::controller(UsuarioController::class)->group(function () {
    //     Route::get('usuarios', 'index')->name('usuarios.index');
    //     Route::get('usuarios/create', 'create')->name('usuarios.create');
    //     Route::post('usuarios/store', 'store')->name('usuarios.store');
    //     Route::get('usuarios/{user}/asignarrole', 'asignarrolevista')->name('usuarios.asignarrolevista');
    //     Route::post('usuarios/{user}/asignarrole', 'asignarrole')->name('usuarios.asignarrole');
    //     Route::get('usuarios/{user}', 'show')->name('usuarios.show');
    //     Route::get('usuarios/{user}/edit', 'edit')->name('usuarios.edit');
    //     Route::put('usuarios/{user}', 'update')->name('usuarios.update');
    //     Route::delete('usuarios/{user}', 'destroy')->name('usuarios.destroy');
    //     Route::get('/cambiar-contrasena', [CambiarContrasenaController::class, 'cambiarContrasena'])->name('cambiar-contrasena');
    //     Route::post('/actualizar-contrasena', [CambiarContrasenaController::class, 'updatePassword'])->name('actualizar-contrasena');
    // });

    /*
    |--------------------------------------------------------------------------
    | Modulo Roles
    |--------------------------------------------------------------------------
    */
    // Route::controller(RoleController::class)->group(function () {
    //     Route::get('roles', 'index')->name('roles.index');
    //     Route::get('roles/create', 'create')->name('roles.create');
    //     Route::post('roles/store', 'store')->name('roles.store');
    //     Route::get('roles/{role}', 'show')->name('roles.show');
    //     Route::get('roles/{role}/edit', 'edit')->name('roles.edit');
    //     Route::put('roles/{role}', 'update')->name('roles.update');
    //     Route::delete('roles/{role}', 'destroy')->name('roles.destroy');
    // });
});