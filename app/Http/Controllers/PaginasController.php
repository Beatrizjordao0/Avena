<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{

     public function index() {
        return view('index');
    }

    public function email() {
        return view('email');
    }

    public function password() {
        return view('password');
    }

    public function schedule() {
        return view('schedule');
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
        return view('informacoesconta');
    }

    public function privacidade() {
        return view('privacidade');
    }

    public function acessibilidade() {
        return view('acessibilidade');
    }

}

