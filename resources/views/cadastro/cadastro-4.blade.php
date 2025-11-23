@extends('layout.cadastro')

@section('etapa', 4)

@section('form-content')
    <div class="users-info">
        <h2>Revisar informações e concluir cadastro</h2>

        <ul>
            <li><strong>Nome:</strong> {{ session('cadastro.name') }} {{ session('cadastro.sobrenome') }}</li>
            <li>
                <p><strong>Data de Nascimento:</strong> 
                    {{ date('d/m/Y', strtotime(session('cadastro.data_nascimento'))) }}
                </p>
            </li>
            <li><strong>Email:</strong> {{ session('cadastro.email') }}</li>
        </ul>
    </div>
    <form action="{{ route('cadastro.salvarEtapa') }}" method="POST">
        @csrf
        <input type="hidden" name="etapa" value="4">
        
        <a href="{{ route('cadastro.reiniciar') }}" class="btn-back">Refazer Cadastro</a>

        <button type="submit" class="btn-next">Concluir Cadastro</button>
    </form>
@endsection



