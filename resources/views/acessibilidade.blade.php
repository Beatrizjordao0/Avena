<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Avena')</title>

    <link rel="stylesheet" href="/css/style.css">

    @stack('styles')
</head>

<body class="layout-config">



    {{-- NAVBAR --}}
    <header class="navbar">
        <div class="left-nav">
            <div class="logo">
                <img src="/img/logo-avena-removebg-preview-dark.png" alt="Logo" style="height:50px;">  
                <span>AVENA</span>
            </div>
        </div>

        <nav class="menu">
            <a href="#">Início</a>
            <span class="divider"></span>
            <a href="#">Equipes</a>
            <span class="divider"></span>
            <a href="#">Configurações</a>
        </nav>

        <div class="perfil">
            <span>Dra. Júlia Evelyn</span>
            <img src="/img/julia-profissional.png" alt="Foto" style="height:50px;">
        </div>
    </header>

    {{-- CONTEÚDO DAS PÁGINAS --}}
    <main>

        <div class="config-header">
            <h1>Configurações</h1>
            <h2 class="titulo-contas">Acessibilidade</h2>
        </div>

        <hr class="linha-config">

        <div class="contas-opcoes">
            <p class="info3-acess">Gerencie os aspectos da sua experiência com a Avena. Essas configurações afetam todas as contas da Avena neste navegador.</p>

        </div>

        <!-- Caixinha de pesquisa aqui -->
        <input type="text" class="pesquisa-config" placeholder="Localizar em configurações">

        <div class="config-topicos">
            <p>Contas</p>
            <p>Privacidade e Segurança</p>
            <p>Acessibilidade</p>
        </div>

        <div class="caixas-direita">
            <div class="caixa-item">
                <img src="/img/simbolomodoescuro.png" class="icone">
                <p>Tema</p>
            </div>

            <div class="toggle-wrapper">
                <label class="toggle">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>


            <div class="caixa-item">
                <img src="/img/aumentarfonte.png" class="icone">
                <p>Aumentar tamanho da fonte</p>
            </div>

            <div class="slider-wrapper">
                <input type="range" min="12" max="32" value="16" class="font-slider">
            </div>

        </div>


        @yield('content')
    </main>

</body>
</html>
