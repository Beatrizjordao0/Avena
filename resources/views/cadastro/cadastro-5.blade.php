@extends('layout.cadastro')

@section('etapa', 5)

@section('form-content')
    <h2>Cadastro concluído com sucesso!</h2>
    <p>Agora você pode acessar sua conta.</p>

    <a href="/login" class="btn-next">Ir para Login</a>
@endsection
