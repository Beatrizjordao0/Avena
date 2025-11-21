@extends('layout.cadastro')

@section('etapa', 4)

@section('form-content')
    <h2>Revisar informações e concluir cadastro</h2>

    <ul>
        <li><strong>Nome:</strong> {{ session('cadastro.name') }} {{ session('cadastro.sobrenome') }}</li>
        <li><strong>Data de Nascimento:</strong> {{ session('cadastro.data_nascimento') }}</li>
        <li><strong>Email:</strong> {{ session('cadastro.email') }}</li>
    </ul>

    <form action="{{ route('cadastro.salvarEtapa') }}" method="POST">
        @csrf
        <input type="hidden" name="etapa" value="4">
        
        <a href="{{ route('cadastro.reiniciar') }}" class="btn-back">Refazer Cadastro</a>

    </form>
@endsection



