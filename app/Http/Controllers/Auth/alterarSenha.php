<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AlterarSenha extends Controller
{
    public function showAlterarSenhaForm()
    {
        $user = Auth::user();

        return view('alterarSenha', [
            'user' => $user
        ]); 
    }

    public function alterarSenha(Request $request)
    {
        $request->validate([
            'senha_atual' => 'required',
            'nova_senha' => 'required|min:6',
            'confirmar_senha' => 'required|same:nova_senha',
        ],[
            'senha_atual.required' => 'O campo senha atual é obrigatório.',
            'nova_senha.required' => 'O campo nova senha é obrigatório.',
            'nova_senha.min' => 'A nova senha deve ter no mínimo 6 caracteres.',
            'confirmar_senha.required' => 'O campo confirmar senha é obrigatório.',
            'confirmar_senha.same' => 'A confirmação de senha não coincide com a nova senha.',
        ]);

        $user = Auth::user();

        // 2. Verifica se a senha atual está correta
        if (!Hash::check($request->senha_atual, $user->password)) {
            return back()->withErrors(['senha_atual' => 'Senha atual incorreta.']);
        }

        // 3. Atualiza no banco!
        $user->password = Hash::make($request->nova_senha);
        $user->save();

        // 4. Feedback pro usuário
        return back()->with('sucesso', 'Senha alterada com sucesso!');
    }
}
