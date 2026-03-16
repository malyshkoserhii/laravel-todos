<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index')->middleware('auth:sanctum');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store')->middleware('auth:sanctum');
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('todos.show')->middleware('auth:sanctum');
Route::patch('/todos/{id}', [TodoController::class, 'update'])->name('todos.update')->middleware('auth:sanctum');
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy')->middleware('auth:sanctum');

Route::get('/comments/{todoId}', [CommentController::class, 'getCommentsBytodoId'])->name('comments.getCommentsBytodoId')->middleware('auth:sanctum');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth:sanctum');
Route::patch('/comments/{id}', [CommentController::class, 'update'])->name('comments.update')->middleware('auth:sanctum');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth:sanctum');
