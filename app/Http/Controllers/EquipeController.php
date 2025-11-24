<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\GruposTerapia;
use App\Models\MembrosGp;
use App\Models\Terapeuta;

class EquipeController extends Controller
{
    // Tela principal de equipes
    public function equipe_index()
    {
        $user = Auth::user();

        // Pacientes veem os grupos que participam
        if ($user->tipo_conta === 'P') {
            $equipes = $user->gruposComoPaciente()->with('grupo')->get();
        } else { // Terapeutas veem os grupos que gerenciam
            $equipes = GruposTerapia::where('id_terapeuta', $user->terapeuta->id_terapeuta)->get();
        }

        return view('equipe.equipe', compact('equipes', 'user'));
    }

    // Tela de criar equipe (somente terapeuta)
    public function create()
    {
        $user = Auth::user();

        if (!$user->terapeuta) {
            return redirect()->route('equipe')->with('error', 'Você precisa ser terapeuta para criar um grupo.');
        }

        return view('equipe.create', compact('user'));
    }

    // Armazena o grupo criado
    public function store(Request $request)
    {
        $user = Auth::user();

        // Verifica se o usuário é terapeuta
        $terapeuta = $user->terapeuta;
        if (!$terapeuta) {
            return redirect()->route('equipe.virarterapeuta')
                             ->with('error', 'Você precisa ser terapeuta para criar uma equipe.');
        }

        $request->validate([
            'nome_gp' => 'required|string|max:255',
        ]);

        // Gera um código aleatório para o grupo
        $codigo = strtoupper(Str::random(8));

        // Cria o grupo
        $grupo = GruposTerapia::create([
            'nome_gp' => $request->nome_gp,
            'id_terapeuta' => $terapeuta->id_terapeuta,
            'cod_gp' => $codigo,
        ]);

        // Redireciona para a tela de código do grupo
        return redirect()->route('equipe.codigo', ['codigo' => $grupo->cod_gp])
                         ->with('success', 'Grupo criado com sucesso!');
    }

    // Tela de upgrade de paciente para terapeuta
    public function upgrade()
    {
        $user = Auth::user();

        if ($user->tipo_conta === 'T') {
            return redirect()->route('equipe');
        }

        return view('config.informacoesconta', [
            'user' => $user
        ]);
    }

   // Salva upgrade do paciente para terapeuta
public function storeUpgrade(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'cpf' => 'required|numeric|unique:terapeuta,cpf', // agora valida na tabela terapeuta
        'file_doc_prof' => 'nullable|file|mimes:pdf,jpg,png',
        'file_rg' => 'nullable|file|mimes:pdf,jpg,png',
    ]);

    // Atualiza apenas o tipo de conta no usuário
    $user->tipo_conta = 'T';
    $user->save();

    // Cria o registro do terapeuta, incluindo CPF
    $terapeuta = Terapeuta::create([
        'user_id' => $user->id,
        'cpf' => $request->cpf,
        'file_doc_prof' => $request->file('file_doc_prof') 
            ? $request->file('file_doc_prof')->store('docs') 
            : null,
        'file_rg' => $request->file('file_rg') 
            ? $request->file('file_rg')->store('docs') 
            : null,
    ]);

    return redirect()->route('equipe.create')
                     ->with('success', 'Agora você é um terapeuta! Crie sua equipe.');
}


    // Paciente entra em um grupo existente
    public function join(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
        ]);

        $user = Auth::user();

        $grupo = GruposTerapia::where('cod_gp', $request->codigo)->first();

        if (!$grupo) {
            return redirect()->back()->with('error', 'Código inválido.');
        }

        if (MembrosGp::where('id_gp', $grupo->id_gp_terapia)->where('id_paciente', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Você já faz parte desta equipe.');
        }

        MembrosGp::create([
            'id_gp' => $grupo->id_gp_terapia,
            'id_paciente' => $user->id,
            'data_entrada' => now(),
            'ativo_gp' => 1,
        ]);

        return redirect()->route('equipe')->with('success', 'Você entrou na equipe com sucesso!');
    }

    // Exibe a página de gestão do grupo (para terapeutas)
    public function show($id)
    {
        $user = Auth::user();

        $grupo = GruposTerapia::with('membros', 'membros.paciente')->findOrFail($id);

        if (!$user->terapeuta || $grupo->id_terapeuta !== $user->terapeuta->id_terapeuta) {
            return redirect()->route('equipe')->with('error', 'Acesso negado.');
        }

        return view('equipe.show', compact('grupo', 'user'));
    }

    // Exibrue o código do gpo
    public function mostrarCodigo($codigo)
    {
        $grupo = GruposTerapia::where('cod_gp', $codigo)->firstOrFail();
        return view('equipe.codigo', compact('grupo'));
    }
}
