<?php

use App\Http\Controllers\SalaController;
use App\Http\Controllers\ReservaController;

Route::resource('salas', SalaController::class);
Route::resource('reservas', ReservaController::class);
