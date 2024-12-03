<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\MascotasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\AdopcionesController;

Route::get('/', [PrincipalController::class, 'index']);
Route::get('/nosotros', [NosotrosController::class, 'index']);

Route::resource('mascotas', MascotasController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('citas', CitasController::class);
Route::resource('adopciones', AdopcionesController::class);





