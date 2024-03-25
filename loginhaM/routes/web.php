<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArtefatoController;
use App\Http\Controllers\TipoController;

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/novo', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/artefatos', [ArtefatoController::class, 'index'])->name('artefatos.index');
Route::get('/artefatos/{id}', [ArtefatoController::class, 'show'])->name('artefatos.show');
Route::get('/artefatos/novo', [ArtefatoController::class, 'create'])->name('artefatos.create');
Route::post('/artefatos', [ArtefatoController::class, 'store'])->name('artefatos.store');
Route::get('/artefatos/{id}/editar', [ArtefatoController::class, 'edit'])->name('artefatos.edit');
Route::put('/artefatos/{id}', [ArtefatoController::class, 'update'])->name('artefatos.update');
Route::delete('/artefatos/{id}', [ArtefatoController::class, 'destroy'])->name('artefatos.destroy');

Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');
Route::get('/tipos/{id}', [TipoController::class, 'show'])->name('tipos.show');
Route::get('/tipos/novo', [TipoController::class, 'create'])->name('tipos.create');
Route::post('/tipos', [TipoController::class, 'store'])->name('tipos.store');
Route::get('/tipos/{id}/editar', [TipoController::class, 'edit'])->name('tipos.edit');
Route::put('/tipos/{id}', [TipoController::class, 'update'])->name('tipos.update');
Route::delete('/tipos/{id}', [TipoController::class, 'destroy'])->name('tipos.destroy');


