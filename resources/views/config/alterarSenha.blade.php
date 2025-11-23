@extends('layout.base')

@section('content')

    @if (session('sucesso'))
        <p style="color: green;">{{ session('sucesso') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('alterar.senha.atualizar') }}" method="POST" class="alterar-senha-form">
        @csrf

        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha_atual" required>

        <label for="nova_senha">Nova senha</label>
        <input type="password" name="nova_senha" required>

        <label for="confirmar_senha">Confirmar nova senha</label>
        <input type="password" name="confirmar_senha" required>

        <button type="submit">Alterar senha</button>
    </form>
@endsection