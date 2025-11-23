@extends('layout.base')

@push('styles')
<link rel="stylesheet" href="/css/configuracoes.css">
@endpush

@section('content')
    <!-- CONTEÚDO DA ESQUERDA -->
    <div class="pagina-completa">
        <div class="div-esquerda-30">
            <h1>Configurações</h1>
            <span class="line"></span>
            <div class="caixa-pesquisa">
                <!-- CAIXINHA DE PESQUISA AQUI -->
                <input type="text" class="pesquisa-config" placeholder="Localizar em configurações">
            </div>
                    
            <div class="config-topicos">
                <a href="{{ route('informacoes.conta') }}" class="{{ request()->routeIs('informacoesconta') ? 'active' : '' }}">Contas</a>
                <a href="{{ route('privacidade') }}" class="{{ request()->routeIs('privacidade') ? 'active' : '' }}">Privacidade e Segurança</a>
                <a href="{{ route('acessibilidade') }}" class="{{ request()->routeIs('acessibilidade') ? 'active' : '' }}">Acessibilidade</a>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-button">Logout</button>
            </form>
        </div>

        <!-- CONTEÚDO DA DIREITA -->
        <div class="div-direita-70">
            @yield('config-content')
        </div>
    </div>
    @endsection