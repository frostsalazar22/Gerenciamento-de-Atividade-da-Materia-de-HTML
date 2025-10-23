<?php

use App\Http\Controllers\MedicamentoController;

Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index');
Route::post('/medicamentos', [MedicamentoController::class, 'store'])->name('medicamentos.store');
