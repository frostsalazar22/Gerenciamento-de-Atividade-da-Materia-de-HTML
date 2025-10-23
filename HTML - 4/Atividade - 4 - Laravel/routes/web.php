<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExameController;

Route::get('/exames', [ExameController::class, 'index'])->name('exames.index');
Route::get('/exames/criar', [ExameController::class, 'create'])->name('exames.create');
Route::post('/exames', [ExameController::class, 'store'])->name('exames.store');
Route::get('/exames/{exame}/editar', [ExameController::class, 'edit'])->name('exames.edit');
Route::put('/exames/{exame}', [ExameController::class, 'update'])->name('exames.update');
Route::delete('/exames/{exame}', [ExameController::class, 'destroy'])->name('exames.destroy');


Route::get('/', function () {
    return view('create');
});



