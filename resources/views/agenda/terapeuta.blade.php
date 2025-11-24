@extends('layout.base')

@php
    $activeMenu = 'equipes';
@endphp

@section('content')

<h1 class="titulo-plano">
    <span class="preto">Plano</span>
    <span class="verde">Semanal</span>
    <span class="preto">de</span>
    <span class="verde">Sala de Atividades – Dr. Alyson</span>
</h1>

<!-- CHECKBOX PARA TROCAR SEM SEM JS -->
<input type="checkbox" id="toggle-semana" hidden>

<!-- SETAS -->
<div class="navegacao-semanat">
    <!-- Voltar p/ semana 1 -->
    <label for="toggle-semana" class="seta-esquerdat">
        <img src="/img/setalado.png" class="seta-icon">
    </label>

    <!-- Ir p/ semana 2 -->
    <label for="toggle-semana" class="seta-direitat">
        <img src="/img/setalado1.png" class="seta-icon">
    </label>
</div>

<!-- ================= SEMANA 1 ================= -->
<div class="container-semanat semana-1">
    
    <a href="/equipe/1" class="btn-voltarplano">
        <img src="/img/seta.png" alt="Voltar" class="seta-icon2">
    </a>

    <div class="dia-semanat">Segunda (24/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da memória
            </div>

            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de dormir
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semanat">Terça (25/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/pulmao.png" class="mini-logo">
                Respiração guiada
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semanat">Quarta (26/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/cerebro.png" class="mini-logo">
                Treino de foco
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semanat">Quinta (27/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da memória
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semanat">Sexta (28/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de dormir
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

</div>


<!-- ================= SEMANA 2 ================= -->
<div class="container-semanat semana-2">

    <label for="toggle-semana" class="btn-voltarplano seta-voltar">
        <img src="/img/seta.png" class="seta-icon2">
    </label>

    <div class="dia-semanat">Sábado (29/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da Memória
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semanat">Domingo (30/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de Dormir
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

</div>    

@endsection