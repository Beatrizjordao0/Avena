<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EquipeController;

// index
Route::get("/", [PaginasController::class, 'index']);

// ==============================
// CADASTRO
// ==============================
Route::post('/cadastro/salvar-etapa', [CadastroController::class, 'salvarEtapa'])
    ->name('cadastro.salvarEtapa');

Route::get('/cadastro', function () {
    return view('cadastro.cadastro-1');
})->name('cadastro.cadastro-1');

Route::get('/cadastro/passo-2', function () {
    return view('cadastro.cadastro-2');
})->name('cadastro.cadastro-2');

Route::get('/cadastro/passo-3', function () {
    return view('cadastro.cadastro-3');
})->name('cadastro.cadastro-3');

Route::get('/cadastro/passo-4', function () {
    return view('cadastro.cadastro-4'); // tela de concluir
})->name('cadastro.cadastro-4');

Route::get('/cadastro/passo-5', function () {
    return view('cadastro.cadastro-5'); // concluído
})->name('cadastro.cadastro-5');

Route::get('/cadastro/reiniciar', function () {
    session()->forget('cadastro');
    return redirect()->route('cadastro.cadastro-1');
})->name('cadastro.reiniciar');

// ==============================
// LOGIN
// ==============================

// Mostrar formulário de login (bloqueia se estiver logado)
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/equipe');
    }
    return app(LoginController::class)->showLoginForm();
})->name('login');

// Processar login
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.attempt');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// ==============================
// EQUIPE
// ==============================
Route::get('/equipe', [EquipeController::class, 'index'])
    ->middleware('auth')
    ->name('equipe');

// ==============================
// OUTRAS ROTAS
// ==============================
Route::get('/desativada', [PaginasController::class, 'desativada']);
Route::get('/email', [PaginasController::class, 'email']);
Route::get('/password', [PaginasController::class, 'password']);
Route::get('/register', [PaginasController::class, 'register']);
Route::get('/schedule', [PaginasController::class, 'schedule']);

Route::get('/jointeam', [PaginasController::class, 'jointeam']);

Route::get('/equipes', [PaginasController::class, 'equipes']);

Route::get('/planopaciente', [PaginasController::class, 'planopaciente']);

Route::get('/criarequipe', [PaginasController::class, 'criarequipe']);

Route::get('/tituloequipe', [PaginasController::class, 'tituloequipe']);

Route::get('/equipecriada', [PaginasController::class, 'equipecriada']);

Route::get('/equipesneuro', [PaginasController::class, 'equipesneuro']);

Route::get('/salaatividades', [PaginasController::class, 'salaatividades']);

Route::get('/contas', [PaginasController::class, 'contas']);

Route::get('/informacoesconta', [PaginasController::class, 'informacoesconta']);

Route::get('/privacidade', [PaginasController::class, 'privacidade']);

Route::get('/acessibilidade', [PaginasController::class, 'acessibilidade']);