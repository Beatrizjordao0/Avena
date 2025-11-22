@extends('layout.base')

@section('content')
    <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avenaequipe">

    <div class="retangulo3">
        <div class="logo-texto-container">
            <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-retangulo">
            <span class="nome-avena-retangulo">AVENA</span>
        </div>

        <!-- Título da equipe -->
        <div class="codigo-container">
            <label for="codigo"> Seu espaço de atendimento foi criado.</label>
            <input type="text" id="codigo" value="ABC123XYZ" readonly class="codigo-input">
            <p class="codigo-explicacao">Compartilhe o código com seus <br> pacientes para começarem a acessar.</p>
        </div>

        <!-- Botões inferior -->
        <div class="botoes-retangulo2">
            <a href="/equipes" class="btnconcluido3">Concluído</a>
        </div>

    </div>
@endsection
