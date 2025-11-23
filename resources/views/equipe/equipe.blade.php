@extends('layout.base')

@section('content')
<img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avena">

<div class="acoes-equipe" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: flex-start; align-items: center;">
    @if($user->tipo_conta === 'T')
        <a href="{{ route('equipe.create') }}" class="btn-criarequipe" style="display: inline-flex; width: auto; margin: 0;">Criar nova equipe</a>
    @endif

    @if($user->tipo_conta === 'P')
        <a href="{{ route('equipe.upgrade') }}" class="btn-criarequipe" style="display: inline-flex; width: auto; margin: 0;">Tornar-se Terapeuta</a>
    @endif

    <button class="btn-ingressar" style="display: inline-flex; width: auto; margin: 0;" onclick="document.getElementById('join-form').style.display='block'">
        Ingressar em uma nova equipe
    </button>


</div>


<!-- Form de ingresso via código -->

<form id="join-form" action="{{ route('equipe.join') }}" method="POST" style="display:none;">
    @csrf
    <input class="pesquisa-equipes" type="text" name="codigo" placeholder="Digite o código da equipe">
    <button type="submit" class="btn-criar2">Entrar</button>
</form>

<div class="linha-equipes">
    <h1 class="titulo-equipes">Equipes</h1>
    <input type="text" class="pesquisa-equipes" placeholder="Pesquisar equipes...">
</div>

<div class="linha-separadora"></div>




@foreach($equipes as $grupo)
<div class="nova-caixa">
    <div class="linha-conteudo">
        <div class="container-quadrado">
            <div class="mini-quadrado">
                @if($user->tipo_conta === 'T')
                    {{ substr($grupo->nome_gp,0,2) }}
                @else
                    {{ substr($grupo->grupo->nome_gp,0,2) }}
                @endif
            </div>
        </div>
        
        @if($user->tipo_conta === 'T')
            <a href="{{ route('terapeutaView', $grupo->id_gp_terapia) }}" class="nome-grupo-link">
                <p>{{ $grupo->nome_gp }}</p>
            </a>
        @else
            <a href="{{ route('pacienteView', $grupo->id_gp) }}" class="nome-grupo-link">
                <p>{{ $grupo->grupo->nome_gp }}</p>
            </a>
        @endif
    </div>
</div>
@endforeach
@endsection
