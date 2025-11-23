<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Avena')</title>
    <link rel="stylesheet" href="/css/style.css">
    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar">
        <div class="left-nav">
            <div class="logo">
                <img src="/img/logo-avena-removebg-preview-dark.png" alt="Logo" style="height:2.5rem; width:2.5rem; border-radius:50%;">  
                <span>AVENA</span>
            </div>
        </div>

        <nav class="menu">
            <a href="{{ route('home') }}">Início</a>
            <span class="divider"></span>
            <a href="/equipe" class="{{ ($activeMenu ?? '') === 'equipe    ' ? 'active' : '' }}">Equipes</a>
            <span class="divider"></span>
            <a href="{{ route('informacoes.conta') }}" class="{{ request()->is('contas') ? 'active' : '' }}">Configurações</a>
        </nav>



        <div class="perfil">
            <span>{{ Auth::user()->name }} {{ Auth::user()->sobrenome }}</span>
            <img src="/img/julia-profissional.png" alt="Foto" style="height:3.5rem; width:3.5rem; border-radius:50%;">
        </div>
    </header>

    {{-- CONTEÚDO DAS PÁGINAS --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
