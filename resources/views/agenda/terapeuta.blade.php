@extends('layout.base')

@section('content')
<h2>Editar Agenda — {{ $grupo->nome_gp }}</h2>

<div style="display:flex; gap:16px; align-items:flex-start;">
    <!-- Biblioteca (esquerda) -->
    <div style="width:30%; border:1px solid #ddd; padding:8px;">
        <h4>Biblioteca</h4>

        <!-- Form simples para criar atividade na biblioteca -->
        <form id="form-criar-atividade" action="{{ route('agenda.libatividade.store') }}" method="POST">
            @csrf
            <div>
                <label>Nome</label>
                <input name="nome_atv" required>
            </div>
            <div>
                <label>Descrição</label>
                <input name="desc_atv">
            </div>
            <button type="submit">Criar atividade</button>
        </form>

        <hr>

        <ul>
            @foreach($biblioteca as $lib)
                <li data-id="{{ $lib->id_atividade }}">
                    {{ $lib->nome_atv }}
                    <!-- botão rápido para adicionar à agenda de um paciente (abre form simples abaixo) -->
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Calendário (direita) -->
    <div style="flex:1; border:1px solid #ddd; padding:8px;">
        <h4>Agenda (visual)</h4>

        <!-- seleção de paciente para editar -->
        <div>
            <label for="paciente-select">Selecionar paciente</label>
            <select id="paciente-select">
                @foreach($grupo->membros as $m)
                    <option value="{{ $m->id_paciente }}">{{ $m->paciente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="agenda-grid" style="display:flex; gap:8px; margin-top:12px;">
            @php $dias = ['Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo']; @endphp
            @for($d=0;$d<7;$d++)
                <div style="flex:1; border:1px dashed #ccc; padding:6px;">
                    <strong>{{ $dias[$d] }}</strong>

                    <ul id="list-dia-{{$d}}">
                        @foreach($agendaGrupo->where('dia_semana',$d) as $it)
                            <li data-id="{{ $it->id_agenda }}">
                                {{ $it->atividade->nome_atv ?? 'Atividade' }} -
                                {{ $it->paciente->name ?? '' }} - {{ $it->hora }}
                                <form action="{{ route('agenda.remover', ['id' => $it->id_agenda]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remover</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    <!-- botão rápido para abrir mini-form de adicionar -->
                    <button class="btn-add-dia" data-dia="{{ $d }}">Adicionar nesta coluna</button>
                </div>
            @endfor
        </div>
    </div>
</div>

<!-- Mini form modal simples para adicionar (submissão para rota agenda.adicionar) -->
<form id="form-adicionar-agenda" action="#" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="id_atividade">
    <input type="hidden" name="id_paciente">
    <input type="hidden" name="dia_semana">
    Hora: <input name="hora" required placeholder="HH:MM">
    <button type="submit">Adicionar</button>
</form>

@endsection
