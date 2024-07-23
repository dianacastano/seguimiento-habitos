<?php
// routes/web.php

use App\Http\Controllers\HabitoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HabitoController::class, 'index'])->name('habitos.index');
Route::get('/crear', [HabitoController::class, 'create'])->name('habitos.create');
Route::post('/guardar', [HabitoController::class, 'store'])->name('habitos.store');
Route::post('/completar/{index}', [HabitoController::class, 'complete'])->name('habitos.complete');
Route::delete('/eliminar/{index}', [HabitoController::class, 'destroy'])->name('habitos.destroy');
