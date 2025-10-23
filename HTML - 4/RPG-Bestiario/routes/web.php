<?php

use App\Http\Controllers\ItemController;


use App\Http\Controllers\BestiarioController;

Route::get('/', [ItemController::class, 'home'])->name('home');


Route::get('/bestiario', [BestiarioController::class, 'index'])->name('bestiario.index');
Route::post('/bestiario/salvar', [BestiarioController::class, 'salvar'])->name('salvar');
Route::get('/bestiario/restaurar', [BestiarioController::class, 'restaurar'])->name('restaurar');

Route::get('/items/{tipo}/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items/{tipo}', [ItemController::class, 'store'])->name('items.store');

Route::get('/items/{tipo}', [ItemController::class, 'index'])->name('items.index');
// lista itens do tipo (magia, personagem, criatura, equipamento)

Route::get('/items/{tipo}/{id}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{tipo}/{id}', [ItemController::class, 'show'])->name('items.show');
// detalhes do item

Route::get('/items/{tipo}/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
// editar item

Route::put('/items/{tipo}/{id}', [ItemController::class, 'update'])->name('items.update');
// salvar edição


Route::delete('/items/{tipo}/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
// deletar edição
