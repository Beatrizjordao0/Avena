<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaginasController extends Controller
{

     public function index() {
        return view('index');
    }

    public function jointeam() {
        return view('jointeam');
    }

    public function equipes() {
        return view('equipes');
    }

    public function planopaciente() {
        return view('planopaciente');
    }

    public function criarequipe() {
        return view('criarequipe');
    }

    public function tituloequipe() {
        return view('tituloequipe');
    }

    public function equipecriada() {
        return view('equipecriada');
    }

    public function equipesneuro() {
        return view('equipesneuro');
    }

    public function salaatividades() {
        return view('salaatividades');
    }

    public function contas() {
        return view('contas');
    }

    public function informacoesconta() {

        $user = Auth::user();

        return view('informacoesconta', [
            'user' => $user
        ]);
    }

    public function privacidade() {
        return view('privacidade');
    }

    public function acessibilidade() {
        return view('acessibilidade');
    }

}

