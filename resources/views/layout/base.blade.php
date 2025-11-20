<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Avena')</title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar">
        <div class="left-nav">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <span>AVENA</span>
            </div>
        </div>

        <nav class="menu">
            <a href="#">Início</a>
            <span class="divider"></span>
            <a href="#" class="active">Equipes</a>
            <span class="divider"></span>
            <a href="#">Configurações</a>
        </nav>

        <div class="perfil">
            <span>Dr. Júlia Evelyn</span>
            <img src="{{ asset('images/perfil.png') }}" alt="Foto">
        </div>
    </header>

    {{-- CONTEÚDO DAS PÁGINAS --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
