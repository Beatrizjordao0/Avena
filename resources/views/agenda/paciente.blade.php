@extends('layout.base')

@php
    $activeMenu = 'equipes';
@endphp


@section('content')

<h1 class="titulo-plano">
    <span class="preto">Seu</span>
    <span class="verde">Plano Semanal</span>
    <span class="preto">da</span>
    <span class="verde">Sala de Atividades – Dr. Alyson</span>
</h1>

<!-- CHECKBOX PARA TROCAR SEM SEM JS -->
<input type="checkbox" id="toggle-semana" hidden>

<!-- SETAS -->
<div class="navegacao-semana">
    <!-- Voltar p/ semana 1 -->
    <label for="toggle-semana" class="seta-esquerda">
        <img src="/img/setalado.png" class="seta-icon">
    </label>

    <!-- Ir p/ semana 2 -->
    <label for="toggle-semana" class="seta-direita">
        <img src="/img/setalado1.png" class="seta-icon">
    </label>
</div>

<!-- ================= SEMANA 1 ================= -->
<div class="container-semana semana-1">
    
    <a href="/equipes" class="btn-voltarplano">
        <img src="/img/seta.png" alt="Voltar" class="seta-icon2">
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
        </div>
    </div>

    <div class="dia-semana">Terça (25/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/pulmao.png" class="mini-logo">
                Respiração guiada
            </div>
        </div>
    </div>

    <div class="dia-semana">Quarta (26/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/cerebro.png" class="mini-logo">
                Treino de foco
            </div>
        </div>
    </div>

    <div class="dia-semana">Quinta (27/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da memória
            </div>
        </div>
    </div>

    <div class="dia-semana">Sexta (28/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de dormir
            </div>
        </div>
    </div>

    <div class="notificações">Notificações
        <div class="notificacao-retangulos">
            <div class="notif-1">Ontem</div>
            <div class="notif-2">Jogo da Memória realizado <br> com sucesso!</div>
            <div class="notif-3">Sons antes de Dormir <br> não realizado!</div>
            <div class="notif-4">Hoje</div>
            <div class="notif-5">Próximo Exercicio: <br> Respiração Guiada </div>
            <div class="notif-6">
                <input type="checkbox" id="alarme-toggle-1" hidden>

                <label for="alarme-toggle-1" class="botao-alarme">
                    <img src="/img/sinos.png" class="sino sino-off">
                    <img src="/img/sino.png" class="sino sino-on">

                    <span class="txt-off">Ativar alarme</span>
                    <span class="txt-on">Desativar alarme</span>
                </label>
            </div>
        </div>
    </div>

</div>


<!-- ================= SEMANA 2 ================= -->
<div class="container-semana semana-2">

    <label for="toggle-semana" class="btn-voltarplano seta-voltar">
        <img src="/img/seta.png" class="seta-icon2">
    </label>

    <div class="dia-semana">Sábado (29/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/quebra.png" class="mini-logo">
                Jogo da Memória
            </div>
        </div>
    </div>

    <div class="dia-semana">Domingo (30/11)
        <div class="mini-retangulos">
            <div class="mini-retangulo">
                <img src="/img/lotus.png" class="mini-logo">
                Sons antes de Dormir
            </div>
        </div>
    </div>

    <div class="notificacao2">Notificações
        <div class="notificacao-retangulos2">
            <div class="notifsemana2-1">Ontem</div>
            <div class="notifsemana2-2">Jogo da Memória realizado <br> com sucesso!</div>
            <div class="notifsemana2-3">Sons antes de Dormir <br> não realizado!</div>
            <div class="notifsemana2-4">Hoje</div>
            <div class="notifsemana2-5">Próximo Exercicio: <br> Respiração Guiada </div>
            <div class="notif-6">
                <input type="checkbox" id="alarme-toggle-2" hidden>

                <label for="alarme-toggle-2" class="botao-alarme">
                    <img src="/img/sinos.png" class="sino sino-off">
                    <img src="/img/sino.png" class="sino sino-on">

                    <span class="txt-off">Ativar alarme</span>
                    <span class="txt-on">Desativar alarme</span>
                </label>
            </div>
        </div>
    </div>

</div>    

@endsection