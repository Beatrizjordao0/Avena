<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\CadastroController;

Route::get("/", [PaginasController::class, 'index']);

Route::get("/login", [PaginasController::class, 'login']);

Route::get('/desativada', [PaginasController::class, 'desativada']);

Route::get('/email', [PaginasController::class, 'email']);

Route::get('/password', [PaginasController::class, 'password']);

Route::get('/register', [PaginasController::class, 'register']);

Route::get('/schedule', [PaginasController::class, 'schedule']);

Route::post('/cadastro/salvar-etapa', [CadastroController::class, 'salvarEtapa'])
    ->name('cadastro.salvarEtapa');

Route::get('/cadastro/passo-1', function () {
    return view('cadastro.cadastro-1');
})->name('cadastro.cadastro-1');

Route::get('/cadastro/passo-2', function () {
    return view('cadastro.cadastro-2');
})->name('cadastro.cadastro-2');

Route::get('/cadastro/passo-3', function () {
    return view('cadastro.cadastro-3');
})->name('cadastro.cadastro-3');

Route::get('/cadastro/passo-4', function () {
    return view('cadastro.cadastro-4');
})->name('cadastro.cadastro-4');

Route::get('/cadastro/passo-5', function () {
    return view('cadastro.cadastro-5');
})->name('cadastro.cadastro-5');