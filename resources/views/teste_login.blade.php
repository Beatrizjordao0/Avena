<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe - Teste Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Usuário Logado</h2>

            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            @if(isset($user->tipo_conta))
                <p><strong>Tipo de Conta:</strong> {{ $user->tipo_conta }}</p>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>

        </div>

    </div>
</body>
</html>
