@extends('layout.base')

@section('content')

<h1 class="titulo-plano">
    <span class="preto">Seu</span>
    <span class="verde">Plano Semanal</span>
    <span class="preto">da</span>
    <span class="verde">Sala de Atividades – Dr. Alyson</span>
</h1>

<!-- Botão Salvar Plano -->
<a href="#" class="btn-salvar-plano">Salvar Plano</a>


<!-- ================= SEMANA 1 ================= -->
<div class="container-semana semana-1">
    
    <a href="/sala" class="btn-voltarplano">
        <img src="/img/seta.png" class="seta-icon2">
    </a>

    <div class="dia-semana segunda">Segunda (24/11)
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

    <div class="dia-semana">Terça (25/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/pulmao.png" class="mini-logo">
                Respiração guiada
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semana">Quarta (26/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/cerebro.png" class="mini-logo">
                Treino de foco
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semana">Quinta (27/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da memória
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semana">Sexta (28/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de dormir
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semana">Sábado (29/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Atividade exemplo
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

    <div class="dia-semana">Domingo (30/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Atividade exemplo
            </div>
            <button class="btn-add-atividade">+</button>
        </div>
    </div>

</div>

    

@endsection

