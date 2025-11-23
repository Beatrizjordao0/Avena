<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avena | Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playwrite+DE+SAS:wght@100..400&family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <main>   <!-- Logo do cabeçalho -->
        <div class="logo nunita-normal">
            <img src='/img/logo-avena-removebg-preview-dark.png' alt="Imagem da logo da Avena">
            <span class="poppins-bold text-name">AVENA</span>
        </div>

        <div class="lado-esquerdo">
            <div class="left-side-container">
                        @php
                            $etapa = intVal($__env->yieldContent('etapa'));
                        @endphp
                <div class="top-form-help-and-back">
                        @if ($etapa > 1 && $etapa < 5)
                            <a href="{{ route('cadastro.cadastro-' . ($etapa - 1)) }}"><i class="fa-solid fa-circle-left"></i></a>
                        @elseif ($etapa == 1)
                            <a href="/login"><i class="fa-solid fa-circle-left"></i></a>
                        @endif

                       
                    <a href="#" class="help-link">Ajuda?</a>
                </div>

                <div class="nunita-normal form-container ">
                    <div class="formform-heading">
                        <h1 class="nunita-normal">
                            @if ($etapa == 4)
                                Cadastro Concluído! 
                            @else  
                                Cadastre-se
                            @endif
                        </h1>
                        <p>
                            @if ($etapa == 4)
                                Parabéns! Seu perfil foi criado com sucesso.
                            @else 
                                Preencha os espaços com suas Informações.
                            @endif
                        </p>

                        @yield("form-heading")
                    </div>
                    <form class="form-row form-column form-check" action="{{ route('cadastro.salvarEtapa') }}" method="POST">
                        @csrf
                        @yield("form-content")

                        <input type="hidden" name="etapa" value="@yield('etapa')">

                        @if ($etapa >= 1 && $etapa < 4)
                        <button type="submit" class="btn-next btn-perfil">Próximo<i class="fa-solid fa-arrow-right"></i></button>
                        @endif
                    </form>
                </div>
                
                <div class="etapa-atual">
                    @yield('etapa') /4 
                </div>
            </div>
        </div>


        <div class="lado-direito">
            <div class="right-side-container login-image-container">
                <div class="background-content">
                    <h1 class="nunita-normal">Faça parte da Avena!</h1>
                    <p class="nunita-normal">Matenha o progresso sempre visível <br> Dentro e fora do consultório</p>
                </div>
            </div>
        </div>
    </main>

    <div class="footer">
        <a class="footer-link" href="#">Política de privacidade</a>
        <a class="footer-link" href="#">Termos de uso</a>
    </div>
</body>
</html>