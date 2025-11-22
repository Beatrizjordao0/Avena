<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avena | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="background-primary">
    
<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
        <div class="col-12 col-sm-7 login-image-container">
            <div class="m-4 d-flex">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="/img/logo-avena-removebg-preview-dark.png" alt="avena-logo" class="me-2 navbar-logo-img" width="40" height="40">
                    <span class="fs-4 poppins-bold text-name">Avena</span>
                </a>
            </div>

            <div class="p-4 p-sm-5 mt-sm-5 text-center">
                <h1 class="nunita-bold text-welcome mt-5 mx-5 mb-4 pt-5 text-start">
                    Personalize, acompanhe <br> e evolua suas rotinas <br> terapêuticas.
                </h1>
                <p class="nunita-bold text-start mx-5 ">
                    Mantenha o progresso sempre visível — <br>dentro e fora do consultório.
                </p>
            </div>
        </div>

        <div class="col-12 col-sm-5 m-0 m-sm-4 p-0 background-color login-card-custom">
            <div class="text-end mt-4 ">
                <a class="nunita-bold text-secondary mx-5 m-4 footer-link fs-6" href="#">Ajuda?</a>
            </div>

            <h1 class="mt-5 py-5 text-center text-welcome">Bem-vindo de volta</h1>

            {{-- Formulário de login --}}
            <form action="{{ route('login.attempt') }}" method="POST" class="px-4 px-sm-5">
                @csrf

                <div class="mb-3">
                    <input
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                        autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input
                        type="password"
                        name="password"
                        placeholder="Senha"
                        class="form-control @error('password') is-invalid @enderror"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Manter-me conectado</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="border border-1 button-gradient mt-3 py-0 px-5 rounded-4 w-50 btn-perfil">
                        <p class="text-welcome fs-5 mt-2 pt-1 nunita-bold">Login</p>
                    </button>
                </div>
            </form>

            <div class="mt-3 text-center form-text px-4 px-sm-5">
                <p class="nunita-bold">Não possui conta? <a href="{{ route('cadastro.cadastro-1') }}">Clique aqui</a></p>
                <a class="nunita-bold" href="#">Esqueci a senha</a>

                <br>

                {{-- ícone acessibilidade --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi mt-4 bi-universal-access-circle" viewBox="0 0 16 16">
                    <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                </svg>
            </div>
        </div>

        <footer class="d-flex flex-column align-items-center gap-2 my-5">
            <div class="mt-0 d-flex gap-4">
                <a class="footer-link" href="/politica-de-acessibilidade.html">Política de privacidade</a>
                <a class="footer-link" href="#">Termo de uso</a>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
