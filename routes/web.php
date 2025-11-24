<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Auth\AlterarSenha;
// index
Route::get('/', [PaginasController::class, 'index'])->name('home');


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

Route::post('/config/foto', [CadastroController::class, 'atualizarFoto'])
    ->middleware('auth')
    ->name('config.foto');


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

Route::get('/equipe', [EquipeController::class, 'equipe_index']) ->middleware('auth') ->name('equipe');


Route::middleware(['auth'])->group(function () {

    // ==========================
    // CRIAR EQUIPES (TERAPEUTA)
    // ==========================
    Route::get('/equipe/create', [EquipeController::class, 'create'])
        ->name('equipe.create');
    Route::post('/equipe/criar', [EquipeController::class, 'store'])
        ->name('equipe.store');

    // ==========================
    // UPGRADE PACIENTE -> TERAPEUTA
    // ==========================
    Route::get('/equipe/upgrade', [EquipeController::class, 'upgrade'])
        ->name('equipe.upgrade');
    Route::post('/equipe/upgrade', [EquipeController::class, 'storeUpgrade'])
        ->name('equipe.storeUpgrade');

    // ==========================
    // ENTRAR EM GRUPO VIA CÓDIGO
    // ==========================
    Route::post('/equipe/join', [EquipeController::class, 'join'])
        ->name('equipe.join');

    // ==========================
    // MOSTRAR DETALHES DE UM GRUPO
    // ==========================
    Route::get('/equipe/{id}', [EquipeController::class, 'show'])
        ->name('equipe.show');

    // ==========================
    // MOSTRAR CÓDIGO DO GRUPO
    // ==========================
    Route::get('/equipe/codigo/{codigo}', [EquipeController::class, 'mostrarCodigo'])
        ->name('equipe.codigo');
});


// Agenda

Route::middleware('auth')->group(function () {

    // Paciente acessa sua agenda
    Route::get('/agenda', function () {
        $user = Auth::user();
        return app(\App\Http\Controllers\AgendaController::class)->pacienteView($user);
    })->name('agenda.paciente');

    // Terapeuta acessa a agenda de um paciente específico
    Route::get('/agenda/terapeuta', function () {
        $user = Auth::user();
        return app(\App\Http\Controllers\AgendaController::class)->terapeutaView($user);
    })->name('agenda.terapeuta');

});



// ==============================
// OUTRAS ROTAS
// ==============================
Route::get('/jointeam', [PaginasController::class, 'jointeam']);

Route::get('/equipes', [PaginasController::class, 'equipes'])->name('equipes');


Route::get('/planopaciente', [PaginasController::class, 'planopaciente'])->name('planopaciente');

Route::get('/criarequipe', [PaginasController::class, 'criarequipe']);

Route::get('/tituloequipe', [PaginasController::class, 'tituloequipe']);

Route::get('/equipecriada', [PaginasController::class, 'equipecriada']);

Route::get('/equipesneuro', [PaginasController::class, 'equipesneuro']);

Route::get('/salaatividades', [PaginasController::class, 'salaatividades']);

Route::get('/contas', [PaginasController::class, 'contas'])->name('contas');

Route::delete('/equipe/{grupo}', [EquipeController::class, 'destroy'])
    ->name('equipe.destroy');
Route::post('/equipe/{id}/leave', [EquipeController::class, 'leave'])->name('equipe.leave');

// Configurações

Route::middleware('auth')->group(function () {

    Route::get('/Conta', [PaginasController::class, 'informacoesconta'])
        ->name('informacoes.conta');

    Route::get('/privacidade', [PaginasController::class, 'privacidade'])
        ->name('privacidade');

    Route::get('/acessibilidade', [PaginasController::class, 'acessibilidade'])
        ->name('acessibilidade');

    Route::get('/alterar-senha', [AlterarSenha::class, 'showAlterarSenhaForm'])
        ->name('alterar.senha');

    Route::post('/alterar-senha', [AlterarSenha::class, 'alterarSenha'])
        ->name('alterar.senha.atualizar');
});

