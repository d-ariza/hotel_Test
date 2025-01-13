<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\AcomodacionController;

Route::middleware('api')->group(function () {
    // Rutas para Hoteles
    Route::get('hotels', [HotelController::class, 'index']);
    Route::post('hotels', [HotelController::class, 'store']);
    Route::get('hotels/{id}', [HotelController::class, 'show']);
    Route::put('hotels/{id}', [HotelController::class, 'update']);
    Route::delete('hotels/{id}', [HotelController::class, 'destroy']);

    // Rutas para Tipos de Habitación
    Route::get('tipos-habitacion', [TipoHabitacionController::class, 'index']);
    Route::post('tipos-habitacion', [TipoHabitacionController::class, 'store']);
    Route::get('tipos-habitacion/{tipoHabitacion}', [TipoHabitacionController::class, 'show']);
    Route::put('tipos-habitacion/{tipoHabitacion}', [TipoHabitacionController::class, 'update']);
    Route::delete('tipos-habitacion/{tipoHabitacion}', [TipoHabitacionController::class, 'destroy']);

    // Rutas para Acomodaciones
    Route::get('acomodaciones', [AcomodacionController::class, 'index']);
    Route::post('acomodaciones', [AcomodacionController::class, 'store']);
    Route::get('acomodaciones/{acomodacion}', [AcomodacionController::class, 'show']);
    Route::put('acomodaciones/{acomodacion}', [AcomodacionController::class, 'update']);
    Route::delete('acomodaciones/{acomodacion}', [AcomodacionController::class, 'destroy']);
});
