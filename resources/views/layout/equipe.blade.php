@extends('layout.base')

@push('styles')
    <link rel="stylesheet" href="/css/equipe.css">
@endpush

@section('content')

<div class="main-header">

    <div class="linha-equipes">
        <h1 class="titulo-equipes">Equipes</h1>
        <input type="text" class="pesquisa-equipes" placeholder="Pesquisar equipes...">
    </div>

    <div class="acoes-equipe">
        <button class="btn-ingressar" style="display: inline-flex; width: auto; margin: 0;" onclick="abrirModal()">
            Ingressar em uma nova equipe
        </button>
        @if($user->tipo_conta === 'T')
            <a href="{{ route('equipe.create') }}" class="btn-criarequipe" style="display: inline-flex; width: auto; margin: 0;">Criar nova equipe</a>
        @endif

        @if($user->tipo_conta === 'P')
            <button class="btn-ingressar" style="display: inline-flex; width: auto; margin: 0;" onclick="abrirModal()">
                Ingressar em uma nova equipe
            </button>
        @endif
    </div>

</div>

<div class="linha-separadora"></div>

<div class="main-teams">
    @yield('equipe-content')
</div>

<!-- MODAL DE INGRESSAR NA EQUIPE -->
<div id="modal-join" class="modal-overlay" style="display:none;">
    <div class="modal-box">
        <h2>Ingressar em uma Equipe</h2>

        <form action="{{ route('equipe.join') }}" method="POST">
            @csrf
            <input class="equipe-pesquisa" type="text" name="codigo" placeholder="Digite o código da equipe" required>
            <button type="submit" class="btn-equipes">Entrar</button>
        </form>

        <button class="modal-close" onclick="fecharModal()">Fechar</button>
    </div>
</div>

<script>
    function abrirModal() {
        document.getElementById('modal-join').style.display = 'flex';
    }

    function fecharModal() {
        document.getElementById('modal-join').style.display = 'none';
    }

    // Fecha ao clicar fora da caixa
    document.addEventListener("click", function(e){
        const modal = document.getElementById("modal-join");
        const box = document.querySelector(".modal-box");

        if(e.target === modal){
            modal.style.display = "none";
        }
    });
</script>


@endsection
