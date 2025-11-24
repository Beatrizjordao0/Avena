<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    // Tela de Login
    public function showLoginForm()
    {
        // Se já estiver logado, redireciona para /equipe
        if (Auth::check()) {
            return redirect()->route('equipe');
        }

        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        // 1. Valida os campos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        // 2. Tenta logar
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('equipe');
        }
        // 3. Caso der erro
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        // 1. Remove o remember_token do usuário
        $user = Auth::user();
        if ($user) {
            $user->setRememberToken(null);
            $user->save();
        }

        // 2. Segue o logout normal
        Auth::logout();

        // 3. Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 4. Apaga o cookie remember_me do navegador
        $cookie = Cookie::forget(Auth::getRecallerName());

        return redirect('/login')->withCookie($cookie);
    }
}
