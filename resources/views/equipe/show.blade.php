@extends('layout.base')

@section('content')
<div class="sala-container">
    <a href="{{ route('equipe') }}">Voltar</a>

    <img src="/img/seta.png" class="seta-icon">

    <div class="lista-usuarios">

        <h2>{{ $grupo->nome_gp }}</h2>
        Código do grupo: <strong>{{ $grupo->cod_gp }}</strong>

        <div class="usuarios-scroll">
            @foreach($grupo->membros as $membro)
            <a href="{{ route('agenda.terapeuta', $membro->paciente->id) }}" class="usuario-item" style="text-decoration: none; color: inherit;">
                <img src="/img/user.png" class="avatar">
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
@endsection
