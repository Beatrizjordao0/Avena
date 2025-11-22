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
            <h2 class="titulo-contas">Privacidade e segurança</h2>
        </div>

        <hr class="linha-config">

        <div class="contas-opcoes">
            <p class="linha1-priv">Saiba mais sobre privacidade na Avena</p>

            <p class="info1-priv">Central de privacidade</p>
            <p class="info2-priv">Política de privacidade</p>
            <p class="info3-priv">Fale conosco</p>

        </div>

        <!-- Caixinha de pesquisa aqui -->
        <input type="text" class="pesquisa-config" placeholder="Localizar em configurações">

        <div class="config-topicos">
            <p>Contas</p>
            <p>Privacidade e Segurança</p>
            <p>Acessibilidade</p>
        </div>

        @yield('content')
    </main>

</body>
</html>
