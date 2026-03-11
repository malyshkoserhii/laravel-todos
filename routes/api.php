<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
// Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
// Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todos.show');
// Route::patch('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
// Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::apiResource('/todos', TodoController::class);
