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
        @if($user->tipo_conta === 'T')
            <button class="btn-usuario" style="display: inline-flex; width: auto; margin: 0;" onclick="abrirModal()">
                Criar nova equipe
            </button>
        @endif

        @if($user->tipo_conta === 'P')
            <button class="btn-usuario" style="display: inline-flex; width: auto; margin: 0;" onclick="abrirModalPaciente()">
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
        <button class="modal-close" onclick="fecharModalPaciente()">x</button>
        <span>Ingresse na sua Equipe de Acompanhamento</span>
        <p>Insira o código que seu terapeuta te enviou para entrar no seu ambiente de atividades e orientações.</p>

        <form class="modal-form" action="{{ route('equipe.join') }}" method="POST">
            @csrf
            <input class="equipe-pesquisa" type="text" name="codigo" placeholder="Digite o código da equipe" required>
            <button type="submit" class="btn-equipes">Entrar</button>
        </form>
    </div>
</div>

<script>
    function abrirModalPaciente() {
        document.getElementById('modal-join').style.display = 'flex';
    }

    function fecharModalPaciente() {
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

<!---------------------------
    Modal de criar Equipe 
 --------------------------->

<div id="modal-create" class="modal-overlay" style="display:none;">
    <div class="modal-box">
        <button class="modal-close" onclick="fecharModal()">x</button>
            <div class="logo-texto">
                <img src="/img/logo-avena-removebg-preview-dark.png" class="logo-retangulo">
                <span class="nome-avena-retangulo">AVENA</span>
            </div>

            <form action="{{ route('equipe.store') }}" method="POST">
                @csrf

                <p>Título da equipe</p>
                <input class="equipe-pesquisa" type="text" name="nome_gp" required>

                <p>Descrição da equipe (opcional)</p>
                <input class="equipe-pesquisa" type="text" name="descricao_gp">
                <div class="button-container">
                    <button href="/equipe" class="botoes-retangulo1">Voltar</button>
                    <button type="submit" class="botoes-retangulo2">Criar</button>
                </div>
            </form>
        </div>
    </div>
<script>
    function abrirModal() {
        document.getElementById('modal-create').style.display = 'flex';
    }

    function fecharModal() {
        document.getElementById('modal-create').style.display = 'none';
    }

    // Fecha ao clicar fora da caixa
    document.addEventListener("click", function(e){
        const modal = document.getElementById("modal-create");

        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
</script>


@endsection
