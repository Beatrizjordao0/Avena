<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function salvarEtapa(Request $request)
    {
        $etapa = $request->input('etapa');

        switch ($etapa) {

            case 1:
                $nome = $request->input("nome");
                $sobrenome = $request->input("sobrenome");
                $cpf = $request->input("cpf");
                $data_nascimento = $request->input("data_nascimento");

                session(['cadastro.nome' => $nome]);
                session(['cadastro.sobrenome' => $sobrenome]);
                session(['cadastro.cpf' => $cpf]);
                session(['cadastro.data_nascimento' => $data_nascimento]);

                return redirect()->route('cadastro.cadastro-2');

            case 2:
                $email = $request->input("email");
                $emailConfirm = $request->input("emailConfirm");

                session(['cadastro.email' => $email]);
                session(['cadastro.emailConfirm' => $emailConfirm]);
        
                return redirect()->route('cadastro.cadastro-3');

            case 3:
                $senha = $request->input("senha");
                $senhaConfirm = $request->input("senhaConfirm");

                session(['cadastro.senha' => $senha]);
                session(['cadastro.senhaConfirm' => $senhaConfirm]);

                return redirect()->route('cadastro.cadastro-4');

            case 4:
                
                return redirect()->route('cadastro.cadastro-5');
            
            case 5:

                return redirect()->route('cadastro.cadastro-5');
        }
    }
}
