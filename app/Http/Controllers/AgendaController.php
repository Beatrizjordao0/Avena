<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\GruposTerapia; // seu model de grupo
use App\Models\LibAtividade;  // biblioteca de atividades do terapeuta
use App\Models\Agenda;        // tabela agenda
use App\Models\MembrosGp;
use App\Models\Terapeuta;
use Carbon\Carbon;

class AgendaController extends Controller
{
    /**
     * View do paciente: mostra o cronograma semanal do paciente dentro de um grupo.
     * - verifica se o usuário é membro do grupo.
     * - carrega as atividades da agenda para o paciente agrupadas por dia da semana.
     */
    public function pacienteView($grupoId)
    {
        $user = Auth::user();

        // Verifica se o usuário pertence ao grupo (membros_gp)
        $membro = MembrosGp::where('id_gp', $grupoId)
            ->where('id_paciente', $user->id)
            ->first();

        if (!$membro) {
            return redirect()->route('equipe.index')->with('error', 'Você não pertence a este grupo.');
        }

        // Carrega o grupo só para exibir nome, etc.
        $grupo = GruposTerapia::findOrFail($grupoId);

        // Carrega agenda do paciente dentro do grupo, ordenado por dia e hora
        $itens = Agenda::where('id_gp', $grupoId)
            ->where('id_paciente', $user->id)
            ->orderBy('dia_semana')
            ->orderBy('hora')
            ->with('atividade') // assume relação Agenda->atividade (LibAtividade)
            ->get();

        // Transformar em array key => dia_semana (0..6 ou 1..7 conforme seu uso)
        $porDia = [];
        for ($d = 0; $d < 7; $d++) {
            $porDia[$d] = collect();
        }

        foreach ($itens as $item) {
            $dia = (int)$item->dia_semana;
            if (!isset($porDia[$dia])) $porDia[$dia] = collect();
            $porDia[$dia]->push($item);
        }

        // retorna a view (esqueleto) com dados mínimos
        return view('agenda.paciente', [
            'grupo' => $grupo,
            'porDia' => $porDia,
            'user' => $user,
        ]);
    }

    /**
     * View do terapeuta: painel editável.
     * - Verifica se o usuário é terapeuta e dono do grupo.
     * - Carrega biblioteca de atividades do terapeuta e membros do grupo.
     */
    public function terapeutaView($grupoId)
    {
        $user = Auth::user();

        // verifica se user é terapeuta e é dono do grupo
        $terapeuta = $user->terapeuta;
        if (!$terapeuta) {
            return redirect()->route('equipe.index')->with('error', 'Você precisa ser terapeuta para editar a agenda.');
        }

        $grupo = GruposTerapia::with('membros.paciente')->findOrFail($grupoId);

        // checa propriedade do grupo
        if ($grupo->id_terapeuta != $terapeuta->id_terapeuta) {
            return redirect()->route('equipe.index')->with('error', 'Acesso negado: este não é seu grupo.');
        }

        // Biblioteca de atividades do terapeuta
        $biblioteca = LibAtividade::where('id_terapeuta', $terapeuta->id_terapeuta)->get();

        // Agenda completa do grupo (todos pacientes) para edição se quiser ver
        $agendaGrupo = Agenda::where('id_gp', $grupoId)
            ->with('atividade', 'paciente') // assume relações
            ->orderBy('dia_semana')
            ->orderBy('hora')
            ->get();

        return view('agenda.terapeuta', [
            'grupo' => $grupo,
            'biblioteca' => $biblioteca,
            'agendaGrupo' => $agendaGrupo,
            'user' => $user,
        ]);
    }

    /**
     * API: cria uma atividade na biblioteca do terapeuta.
     * Request: nome_atv, desc_atv (opcional)
     */
    public function storeLibAtividade(Request $request)
    {
        $user = Auth::user();
        $terapeuta = $user->terapeuta;
        if (!$terapeuta) {
            return response()->json(['error' => 'Somente terapeutas podem criar atividades.'], 403);
        }

        $v = Validator::make($request->all(), [
            'nome_atv' => 'required|string|max:100',
            'desc_atv' => 'nullable|string|max:255',
        ]);

        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $lib = LibAtividade::create([
            'id_terapeuta' => $terapeuta->id_terapeuta,
            'nome_atv' => $request->nome_atv,
            'desc_atv' => $request->desc_atv,
        ]);

        return response()->json(['lib' => $lib], 201);
    }

    /**
     * API: adicionar uma atividade ao cronograma (agenda)
     * Request expects: id_atividade, id_paciente, dia_semana (0..6), data (YYYY-MM-DD) optional, hora (HH:MM), alarme (0|1)
     */
    public function adicionarAgenda(Request $request, $grupoId)
    {
        $user = Auth::user();
        $terapeuta = $user->terapeuta;
        if (!$terapeuta) {
            return response()->json(['error' => 'Somente terapeutas podem adicionar atividades.'], 403);
        }

        // validação básica
        $v = Validator::make($request->all(), [
            'id_atividade' => 'required|integer|exists:lib_atividade,id_atividade',
            'id_paciente' => 'required|integer|exists:users,id',
            'dia_semana' => 'required|integer|min:0|max:6',
            'data' => 'nullable|date',
            'hora' => 'required|date_format:H:i',
            'alarme' => 'nullable|boolean',
        ]);

        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        // checar se o paciente pertence ao grupo
        $membro = MembrosGp::where('id_gp', $grupoId)->where('id_paciente', $request->id_paciente)->first();
        if (!$membro) {
            return response()->json(['error' => 'Paciente não pertence a este grupo.'], 422);
        }

        // cria o item na agenda
        $item = Agenda::create([
            // campos do seu schema
            'id_agenda' => null, // se seu PK é autoincrement, não enviar; Eloquent ajusta automaticamente
            'id_gp' => $grupoId,
            'id_paciente' => $request->id_paciente,
            'id_atividade' => $request->id_atividade,
            'dia_semana' => $request->dia_semana,
            'data' => $request->data ?? Carbon::now()->toDateString(),
            'hora' => $request->hora,
            'alarme' => $request->boolean('alarme', false),
            'concluida' => 0,
        ]);

        return response()->json(['item' => $item], 201);
    }

    /**
     * API: remove item da agenda (terapeuta)
     */
    public function removerAgenda($id)
    {
        $user = Auth::user();
        $terapeuta = $user->terapeuta;
        if (!$terapeuta) {
            return response()->json(['error' => 'Somente terapeutas podem remover itens.'], 403);
        }

        $item = Agenda::find($id);
        if (!$item) {
            return response()->json(['error' => 'Item não encontrado.'], 404);
        }

        // opcional: checar se terapeuta dono do grupo
        $grupo = GruposTerapia::find($item->id_gp);
        if ($grupo->id_terapeuta != $terapeuta->id_terapeuta) {
            return response()->json(['error' => 'Acesso negado.'], 403);
        }

        $item->delete();
        return response()->json(['ok' => true], 200);
    }

    /**
     * Toggle concluída (paciente pode marcar/terapeuta também)
     */
    public function toggleConcluida($id)
    {
        $user = Auth::user();
        $item = Agenda::find($id);
        if (!$item) {
            return response()->json(['error' => 'Item não encontrado.'], 404);
        }

        // só paciente dono do item ou terapeuta dono do grupo podem alternar
        $grupo = GruposTerapia::find($item->id_gp);
        $terapeuta = $user->terapeuta ?? null;

        if ($item->id_paciente != $user->id && ($terapeuta === null || $grupo->id_terapeuta != $terapeuta->id_terapeuta)) {
            return response()->json(['error' => 'Sem permissão.'], 403);
        }

        $item->concluida = $item->concluida ? 0 : 1;
        $item->save();

        return response()->json(['item' => $item]);
    }

    /**
     * Retorna agenda em JSON (útil para o front)
     */
    public function agendaJson($grupoId)
    {
        $user = Auth::user();

        // se paciente: retorna apenas as suas atividades
        if ($user->tipo_conta === 'P') {
            $itens = Agenda::where('id_gp', $grupoId)
                ->where('id_paciente', $user->id)
                ->with('atividade')
                ->get();
        } else {
            // terapeuta: retorna tudo do grupo
            $itens = Agenda::where('id_gp', $grupoId)
                ->with('atividade', 'paciente')
                ->get();
        }

        return response()->json(['itens' => $itens]);
    }
}
