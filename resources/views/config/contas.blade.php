@extends('layout.base')

@section('content')
    {{-- CONTEÚDO DAS PÁGINAS --}}
        <div class="config-header">
            <h1>Configurações</h1>
            <h2 class="titulo-contas">Contas</h2>
        </div>

        <hr class="linha-config">

        <div class="contas-opcoes">
            <a href="{{ route('informacoes.conta') }}" class="linha1">Informações da Conta</a>
            <div class="logout-container">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-button">Logout</button>
                </form>
            </div>
        </div>

        <!-- Caixinha de pesquisa aqui -->
        <input type="text" class="pesquisa-config" placeholder="Localizar em configurações">

        <div class="config-topicos">
            <a href="{{ route('contas') }}" class="active">Contas</a>
            <a href="{{ route('privacidade') }}">Privacidade e Segurança</a>
            <a href="{{ route('acessibilidade') }}">Acessibilidade</a>
        </div>
    @endsection