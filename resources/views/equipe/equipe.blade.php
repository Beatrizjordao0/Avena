@extends('layout.equipe')

@section('equipe-content')
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
                    <a href="{{ route('equipe.show', $grupo->id_gp_terapia) }}" class="nome-grupo-link">{{ $grupo->nome_gp }}</a>
                @else
                    <a href="{{ route('agenda.paciente', $grupo->id_gp) }}" class="nome-grupo-link">
                    {{ $grupo->grupo->nome_gp }}
                    </a>
                @endif
            </div>
        </div>
    @endforeach
@endsection
