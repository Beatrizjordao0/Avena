@extends('layout.base')

@php
    $activeMenu = 'equipes';
@endphp


@section('content')
    <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avena">  

    <button class="btn-ingressar">Ingressar em uma<br>
    nova equipe</button>

    <div class="linha-equipes">
        <h1 class="titulo-equipes">Equipes</h1>

        <input type="text" class="pesquisa-equipes" placeholder="Pesquisar equipes...">
    </div>

    <div class="linha-separadora">

    </div> 

    <a href="/planopaciente" style="text-decoration: none; color: inherit;">
        <div class="nova-caixa">
            <div class="linha-conteudo">
                <div class="container-quadrado">
                    <div class="mini-quadrado">SD</div>
                </div>
                <p>Sala de Atividades – Dr. Alyson</p>
            </div>
        </div>
    </a>
@endsection

