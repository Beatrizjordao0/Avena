<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avena | Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/cadastro.css">

    <style>

    </style>
</head>
<body>
            <!-- Logo do cabeçalho -->
        <div class="logo">
            <img src='/img/logo-avena-removebg-preview-dark' alt="Imagem da logo da Avena">
            <span>Avena</span>
        </div>
            <!-- Parte superior do cadastro -->
        <div class="left-side-container">
            <div class="top-form-help-and-back">
                <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="#" class="help-link">Ajuda?</a>
            </div>

            <div class="form-container">
                <div class="form-heading">
                    @yield("form-heading")
                </div>
                <form action="{{ route('cadastro.salvarEtapa') }}" method="POST">
                    @csrf
                    @yield("form-content")

                    <input type="hidden" name="etapa" value="@yield('etapa')">
                    @php
                        $etapa = intVal($__env->yieldContent('etapa'));
                    @endphp

                    <!-- Botão Voltar -->
                    @if ($etapa > 1 && $etapa < 5)
                        <a href="{{ route('cadastro.cadastro-' . ($etapa - 1)) }}" class="btn-back">Voltar</a>
                    @endif

                    <!-- Botão Próximo / Concluir -->
                    @if ($etapa >= 1 && $etapa < 4)
                        <button type="submit" class="btn-next">Próximo <i class="fa-solid fa-arrow-right"></i></button>
                    @elseif ($etapa == 4)
                        <button type="submit" class="btn-next">Concluir Cadastro</button>
                    @endif

                </form>
            </div>
            <div class="etapa-atual">
                @yield('etapa')/3
            </div>
        </div>
</body>
</html>