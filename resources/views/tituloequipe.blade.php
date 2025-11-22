@extends('layout.base')

@section('content')
    <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avenajoin">

    <div class="retangulo2">
        <!-- LOGO + NOME -->
        <div class="logo-texto-container">
            <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-retangulo">
            <span class="nome-avena-retangulo">AVENA</span>
        </div>

        <!-- Título da equipe -->
        <p>Título da equipe</p>
        <input type="text" class="input-retangulo2" placeholder="Digite o título">

        <!-- Descrição da equipe -->
        <p>Descrição da equipe (opcional)</p>
        <input type="text" class="input-retangulo2" placeholder="Digite a descrição">

        <!-- Botões inferior -->
        <div class="botoes-retangulo2">
            <a href="/criarequipe" class="btn-cancelar2">Voltar</a>
            <a href="/equipecriada" class="btn-criar2">Criar</a>
        </div>

    </div>
@endsection

