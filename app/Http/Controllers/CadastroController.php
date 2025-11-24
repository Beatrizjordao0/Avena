<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CadastroController extends Controller
{
    public function salvarEtapa(Request $request)
    {
        $etapa = $request->input('etapa');

        switch ($etapa) {

            case 1:
                // Etapa 1: nome, sobrenome, data de nascimento
                $request->validate([
                    'name' => 'required|string|max:100',
                    'sobrenome' => 'required|string|max:100',
                    'data_nascimento' => 'required|date',
                ], [
                    'name.required' => 'O campo nome é obrigatório.',
                    'sobrenome.required' => 'O campo sobrenome é obrigatório.',
                    'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
                ]);

                // Salva dados na session temporariamente
                session([
                    'cadastro.name' => $request->input("name"),
                    'cadastro.sobrenome' => $request->input("sobrenome"),
                    'cadastro.data_nascimento' => $request->input("data_nascimento"),
                ]);

                return redirect()->route('cadastro.cadastro-2');

            case 2:
                // Etapa 2: email
                $request->validate([
                    'email' => 'required|email|max:255|unique:users,email',
                    'emailConfirm' => 'required|email|max:255',
                ], [
                    'email.required' => 'O campo email é obrigatório.',
                    'email.email' => 'O campo email deve ser um endereço de email válido.',
                    'email.max' => 'O campo email não pode ter mais de 255 caracteres.',
                    'email.unique' => 'Este email já está cadastrado.',
                    'emailConfirm.required' => 'O campo de confirmação de email é obrigatório.',
                    'emailConfirm.email' => 'O campo de confirmação de email deve ser um endereço de email válido.',
                    'emailConfirm.max' => 'O campo de confirmação de email não pode ter mais de 255 caracteres.',
                ]);

                // Verifica se email e emailConfirm coincidem
                if ($request->input('email') !== $request->input('emailConfirm')) {
                    return back()->withErrors(['emailConfirm' => 'Os emails não coincidem.'])->withInput();
                }
                // Salva email na session temporariamente
                session([
                    'cadastro.email' => $request->input("email"),
                ]);

                return redirect()->route('cadastro.cadastro-3');

            case 3:
                // Etapa 3: senha
                $request->validate([
                    'senha' => 'required|string|min:6',
                    'senhaConfirm' => 'required|string|min:6',
                ], [
                    'senha.required' => 'O campo senha é obrigatório.',
                    'senha.min' => 'A senha deve conter no mínimo 6 caracteres.',
                    'senhaConfirm.required' => 'O campo de confirmação de senha é obrigatório.',
                    'senhaConfirm.min' => 'A senha de confirmação deve conter no mínimo 6 caracteres.',
                ]);

                // Verifica se senha e senhaConfirm coincidem
                if ($request->input('senha') !== $request->input('senhaConfirm')) {
                    return back()->withErrors(['senhaConfirm' => 'As senhas não coincidem.'])->withInput();
                }
                // Salva a senha na session temporariamente
                session([
                    'cadastro.senha' => $request->input('senha'),
                ]);

                return redirect()->route('cadastro.cadastro-4');

            case 4:
                // Etapa 4: concluir cadastro 

                // Os campos da session são inseridos no banco
                $user = User::create([
                    'name' => session('cadastro.name'),
                    'sobrenome' => session('cadastro.sobrenome'),
                    'data_nascimento' => session('cadastro.data_nascimento'),
                    'email' => session('cadastro.email'),
                    'password' => Hash::make(session('cadastro.senha')),
                    'tipo_conta' => 'P', // padrão paciente
                ]);

                // Limpa a session temporária
                session()->forget('cadastro');

                return redirect()->route('cadastro.cadastro-5');
        }
    }


// Atualiza a foto de perfil do usuário
public function atualizarFoto(Request $request)
{   
    // Valida a imagem
    $request->validate([
        'file_foto_perfil' => 'nullable|image|max:2048'
    ]);

    $user = Auth::user();
    // Checa se enviou uma nova foto
    if ($request->hasFile('file_foto_perfil')) {

        // Só apaga se o campo não for null E o arquivo realmente existir
        if (!empty($user->file_foto_perfil) && Storage::disk('public')->exists($user->file_foto_perfil)) {
            Storage::disk('public')->delete($user->file_foto_perfil);
        }

        // Salva a nova foto
        $path = $request->file('file_foto_perfil')->store('fotos_perfil', 'public');

        // Atualiza o banco
        $user->file_foto_perfil = $path;
        $user->save();
    }

    return redirect()->back()->with('success', 'Foto de perfil atualizada com sucesso!');
}


}
