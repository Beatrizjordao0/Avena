@extends('layout.base')

@section('content')
<img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avena">

<div class="retangulo2">
    <h1>Crie sua Equipe</h1>
<br><br>
    <form action="{{ route('equipe.store') }}" method="POST">
        @csrf
        <label for="nome_gp">Nome da equipe:</label>
        <input class="input-retangulo2" type="text" name="nome_gp" required>
<br>
        <label for="descricao_gp">Descrição (opcional):</label>
        <input class="input-retangulo2" type="text" name="descricao_gp">

        <button type="submit" class="btn-criar2">Criar</button>
    </form>
</div>
@endsection
