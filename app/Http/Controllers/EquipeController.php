<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipeController extends Controller
{
    public function index()
    {
        // pega o usuário autenticado
        $user = Auth::user();

        return view('teste_login', compact('user'));
    }
}
