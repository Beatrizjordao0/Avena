<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;

Route::get("/", [PaginasController::class, 'index']);

Route::get("/login", [PaginasController::class, 'login']);

Route::get('/desativada', [PaginasController::class, 'desativada']);

Route::get('/email', [PaginasController::class, 'email']);

Route::get('/password', [PaginasController::class, 'password']);

Route::get('/register', [PaginasController::class, 'register']);

Route::get('/schedule', [PaginasController::class, 'schedule']);