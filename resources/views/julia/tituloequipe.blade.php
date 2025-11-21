@extends('layout.base')

@section('content')
    <img src="/img/logo-avena-removebg-preview.png" class="logo-avena2">

    <div class="retangulo2">
        <!-- LOGO + NOME -->
        <div class="logo-texto-container">
            <img src="/img/logo-avena-removebg-preview.png" class="logo-retangulo">
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
            <button class="btn-cancelar2">Voltar</button>
            <button class="btn-criar2">Criar</button>
        </div>

    </div>
@endsection

