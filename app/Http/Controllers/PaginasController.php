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
        $user = Auth::user();

        return view('config.contas', [
            'user' => $user
        ]);
    }

    public function informacoesconta() {

        $user = Auth::user();

        return view('config.informacoesconta', [
            'user' => $user
        ]);
    }

    public function privacidade() {
        $user = Auth::user();

        return view('config.privacidade', [
            'user' => $user
        ]);
    }

    public function acessibilidade() {
        $user = Auth::user();

        return view('config.acessibilidade', [
            'user' => $user
        ]);
    }

}

