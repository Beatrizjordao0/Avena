<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avena | Login</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <main>
        {{-- Lado esquerdo do Login --}}
    <div class="lado-esquerdo">
        {{-- Logo --}}
        <div class="logo-container">
            <img src="/img/logo-avena-removebg-preview-dark.png" alt="avena-logo" class="logo-img">
            <span class="logo-text">AVENA</span>
        </div>

        {{-- Texto e imagem atrativos --}}

        <div class="conteudo-esquerdo">
            {{-- Textos --}}
            <span class="titulo-esquerdo">
                Personalize, acompanhe e evolua suas rotinas terapêuticas.
            </span>
            <span class="subtitulo-esquerdo">
                Mantenha o progresso sempre visível — dentro e fora do consultório.
            </span>
        </div>
    </div>

{{-- -----------------------------------------------------------------4--------------------------------------------- --}}
    {{-- Lado Direito do login --}}
    <div class="lado-direito">
        <div class="form-container">
            <div class="top-help">
                <a href="#" class="help">Ajuda?</a>
            </div>
            <span class="form-title">Bem vindo de volta!</span>
{{-- --------------------------------------------------------------------------------------------------------------- --}}
        {{-- FORM --}}
            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf
                <div class="inputLabel">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="Digite seu e-mail">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                </div>

                <div class="inputLabel password-wrapper">
                    <label for="password">Senha</label>

                    <input type="password" name="password" id="password" required placeholder="Sua senha">

                    <i class="toggle-password fa-solid fa-eye" onclick="togglePassword()"></i>

                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <script>
                function togglePassword() {
                    const input = document.getElementById("password");
                    const icon = document.querySelector(".toggle-password");

                    if (input.type === "password") {
                        input.type = "text";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    } else {
                        input.type = "password";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    }
                }
                </script>


                {{-- LEMBRAR --}}
                <div class="checkbox-inputLabel">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Manter-me conectado</label>
                </div>

                {{-- BOTÃO --}}
                <button type="submit" class="btn-login">Entrar</button>
                
                <p class="nunita-bold">Não possui conta? <a href="{{ route('cadastro.cadastro-1') }}">Clique aqui</a></p>
                {{-- ERRO GERAL DE LOGIN --}}
                @if ($errors->has('email'))
                    <div class="error geral">
                        {{ $errors->first('email') }}
                    </div>
                @endif

            </form>
{{-- ----------------------------------------------------------------------------------------------------------------- --}}
        </div>
    </div>
    </main>
    <div class="footer">
        <a class="footer-link" href="#">Política de privacidade</a>
    <a class="footer-link" href="#">Termos de uso</a>
    </div>
</body>
</html>