<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Acceso;

// Home route
Route::get('/', [HomeController::class, 'home_index'])->name('home_index')->middleware(Acceso::class);

// Login route
Route::get('/login', [LoginController::class, 'login_index'])->name('login_index');
Route::post('/login', [LoginController::class, 'login_index_post'])->name('login_index_post');
Route::get('/salir', [LoginController::class, 'login_salir'])->name('login_salir');


// Equipos routes
Route::get('/equipos', [App\Http\Controllers\EquiposController::class, 'equipos_index'])->name('equipos_index')->middleware(Acceso::class);
Route::post('/equipos', [App\Http\Controllers\EquiposController::class, 'equipos_index_post'])->name('equipos_index_post')->middleware(Acceso::class);

// Jugadores routes
Route::get('/jugadores', [App\Http\Controllers\JugadoresController::class, 'jugadores_index'])->name('jugadores_index')->middleware(Acceso::class);
Route::post('/jugadores', [App\Http\Controllers\JugadoresController::class, 'jugadores_index_post'])->name('jugadores_index_post')->middleware(Acceso::class);
Route::get('/jugadores/eliminar/{id}', [App\Http\Controllers\JugadoresController::class, 'jugadores_eliminar'])->name('jugadores_eliminar')->middleware(Acceso::class);


/*
 * Alternativa para usar el método index del controlador HomeController.
 * En este caso, se asume que el método index está definido en el controlador.
 */
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');