<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    // Mostrar o formulário de login
    public function showLoginForm()
    {
        // Se já estiver logado, redireciona para /equipe
        if (Auth::check()) {
            return redirect()->route('equipe');
        }

        return view('login');
    }

    // Processar o login
    public function login(Request $request)
    {
        // Validação dos campos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        // Tenta logar
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('equipe');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput();
    }

    // Logout com limpeza do remember_token
    public function logout(Request $request)
    {
        // Remove o remember_token do usuário
        $user = Auth::user();
        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }

        // Logout normal
        Auth::logout();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Apaga o cookie remember_me do navegador
        $cookie = Cookie::forget(Auth::getRecallerName());

        return redirect('/login')->withCookie($cookie);
    }
}
