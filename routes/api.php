<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index')->middleware('auth:sanctum');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store')->middleware('auth:sanctum');;
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todos.show')->middleware('auth:sanctum');;
Route::patch('/todos/{id}', [TodoController::class, 'update'])->name('todos.update')->middleware('auth:sanctum');;
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy')->middleware('auth:sanctum');;
