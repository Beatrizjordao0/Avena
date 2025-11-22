@extends('layout.base')

@php
    $activeMenu = 'equipes';
@endphp


@section('content')
    <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avenajoin">

    <div class="retangulo">
        <h1>Ingresse na sua Equipe de Acompanhamento</h1>
        <p>Insira o código que seu terapeuta te enviou para<br>
             entrar no seu ambiente de atividades e orientações.</p>

        <div class="input-box">
            <input type="text" placeholder="Digite aqui...">
        </div>

        
        <a href="/equipes" class="btn-ingressar2">Ingressar</a>
    </div>
@endsection

