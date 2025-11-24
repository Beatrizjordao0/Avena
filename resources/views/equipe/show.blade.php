@extends('layout.base')

@section('content')
<div class="sala-container">
    <a href="{{ route('equipe') }}" class="btn-voltar">
        <img src="/img/seta.png" alt="Voltar" class="seta-icon2">
    </a>
    <div class="lista-usuarios">

        <h2>{{ $grupo->nome_gp }}</h2>
        <div class="cod-grupo">
            Código do grupo: <strong>{{ $grupo->cod_gp }}</strong>
        </div>

        <div class="usuarios-scroll">
            @foreach($grupo->membros as $membro)
            
            <a href="{{ route('agenda.terapeuta', $membro->paciente->id) }}" class="usuario-item" style="text-decoration: none; color: inherit;">
                <div class="avatar">
                    <img 
                    src="{{ $membro->paciente->file_foto_perfil 
                        ? asset('storage/' . $membro->paciente->file_foto_perfil) 
                        : '/img/user.png' }}" 
                    class="avatar"
                >
            </div>
               
                <span>{{ $membro->paciente->name }}</span>
            </a>
            @endforeach
        </div>
    </div>

    <div class="notificacoes-container">

        <div class="notif-header">
            <span>NOTIFICAÇÕES</span>
        </div>

        <div class="notificacoes-scroll">
            @foreach($grupo->membros as $membro)
                @foreach($membro->paciente?->notificacoes ?? [] as $not)
                    <div class="notif-card">
                        {{ $membro->paciente->name }} - {{ $not->title_notifica ?? 'Sem título' }}
                        <span class="hora">{{ $not->data_envio?->format('H:i') ?? '' }}</span>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@if ($user->tipo_conta === 'T')
    <form class="destroy-leave" action="{{ route('equipe.destroy', $grupo->id_gp_terapia) }}" method="POST" 
        onsubmit="return confirm('Tem certeza que deseja excluir este grupo? Isso não pode ser desfeito.');">
        @csrf
        @method('DELETE')
        <button class="btn-excluir btn-grupo">Excluir equipe</button>
    </form>  
@endif
@endsection
