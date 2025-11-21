@extends('layout.base')

@section('content')

    <h1 class="titulo-plano">
        <span class="preto">Seu</span> 
        <span class="verde">Plano Semanal</span> 
        <span class="preto">da</span> 
        <span class="verde">Sala de Atividades – Dr. Alyson</span>
    </h1>


    <div class="container-semana">

        <div class="dia-semana segunda">Segunda (24/11)
            <div class="mini-retangulos">
                <div class="mini-retangulo">
                    <img src="/img/quebra.png" class="mini-logo" alt="">
                    Jogo da memória
                </div>

                <div class="mini-retangulo cinza">
                    <img src="/img/lotus.png" class="mini-logo" alt="">
                    Sons antes de dormir
                </div>
            </div>
        </div>

        <div class="dia-semana">Terça (25/11)
            <div class="mini-retangulos">
                <div class="mini-retangulo">
                    <img src="/img/pulmao.png" class="mini-logo" alt="">
                    Respiração guiada
                </div>
            </div>
        </div>

        <div class="dia-semana">Quarta (26/11)
            <div class="mini-retangulos">
                <div class="mini-retangulo">
                    <img src="/img/cerebro.png" class="mini-logo" alt="">
                    Treino de foco
                </div>
            </div>
        </div>

        <div class="dia-semana">Quinta (27/11)
            <div class="mini-retangulos">
                <div class="mini-retangulo">
                    <img src="/img/quebra.png" class="mini-logo" alt="">
                    Jogo da memória
                </div>
            </div>
        </div>

        <div class="dia-semana">Sexta (28/11)
            <div class="mini-retangulos">
                <div class="mini-retangulo">
                    <img src="/img/lotus.png" class="mini-logo" alt="">
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
                <div class="notif-5">Próximo Exercicio: <br>  Respiração Guiada </div>
                <div class="notif-6">Ativar alarmes</div>
            </div>
        </div>

    </div>

    

@endsection

