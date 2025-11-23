<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\LibAtividade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    // Tela do paciente
    public function pacienteView()
    {
        $user = Auth::user();

        return view('agenda.paciente');
    }

    // Tela do terapeuta 
    public function terapeutaView(User $paciente)
    {
        $user = Auth::user();

       return view('agenda.terapeuta');
    }

}
