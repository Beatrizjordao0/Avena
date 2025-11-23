@extends('layout.base')

@section('content')
@php
    // porDia: array com chaves 0..6 (coleções de Agenda items)
    $dias = ['Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'];
@endphp

<h2>Plano semanal — {{ $grupo->nome_gp }}</h2>

<div class="agenda-grid" style="display:flex; gap:12px;">
    @for($d = 0; $d < 7; $d++)
        <div class="col-dia" style="flex:1; border:1px solid #ddd; padding:8px;">
            <h4>{{ $dias[$d] }}</h4>

            <ul style="list-style:none; padding:0; margin:0;">
                @foreach($porDia[$d] as $item)
                    <li style="margin-bottom:8px; border:1px solid #eee; padding:6px;">
                        <div>{{ $item->atividade->nome_atv ?? 'Atividade' }} — {{ $item->hora }}</div>
                        <div>
                            <form action="{{ route('agenda.toggleConcluida', ['id' => $item->id_agenda]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit">{{ $item->concluida ? 'Marcar como não' : 'Marcar como concluída' }}</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endfor
</div>
@endsection
