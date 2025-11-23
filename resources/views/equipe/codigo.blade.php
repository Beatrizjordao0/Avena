@extends('layout.base')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Seu espaço de atendimento <br> foi criado com Sucesso!
        </div>
        <div class="card-body">
            <h5 class="card-title">Nome do Grupo: {{ $grupo->nome_gp }}</h5>
            <p class="card-text">
                Código do Grupo: <strong>{{ $grupo->cod_gp }}</strong>
            </p>
            <a href="{{ route('equipe') }}" class="btn btn-primary">Voltar para minhas equipes</a>
        </div>
    </div>
</div>
@endsection
