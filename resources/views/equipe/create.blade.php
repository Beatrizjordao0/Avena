
@extends('layout.base')

@section('content')
    <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avenajoin">

    <div class="retangulo2">
        <!-- LOGO + NOME -->
        <div class="logo-texto-container">
            <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-retangulo">
            <span class="nome-avena-retangulo">AVENA</span>
        </div>
        <form action="{{ route('equipe.store') }}" method="POST">
            @csrf
        <!-- Título da equipe -->
            <p>Título da equipe</p>
            <input class="input-retangulo2" type="text" name="nome_gp" required>

            <!-- Descrição da equipe -->
            <p>Descrição da equipe (opcional)</p>
            <input class="input-retangulo2" type="text" name="descricao_gp">

            <!-- Botões inferior -->
            <div class="botoes-retangulo2">
                <a href="/equipe" class="btn-cancelar2">Voltar</a>
                <button type="submit" class="btn-criar2">Criar</button>
            </div>
        </form>
    </div>
@endsection