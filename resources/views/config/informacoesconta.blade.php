@extends('layout.config')

@section('config-content')
        <h2 class="titulo-contasinfo">Informações da conta</h2>
        <span class="line"></span>

        <!-- OPÇÕES DE CONTAS -->
        <div class="contas-opcoesinfo">
            <p class="info-bold">Nome de usuário</p>
            <p class="info">{{ $user->name }} {{ $user->sobrenome }}</p>

            <p class="info-bold">E-mail</p>
            <p class="info">{{ $user->email }}</p>

            <p class="info-bold">Data de nascimento</p>
            <p class="info">{{ $user->data_nascimento }}</p>

            <a href="{{ route('alterar.senha') }}" class="info-bold info-link">Alterar a sua senha?</a>

            <form action="{{ route('config.foto') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <label class="label-foto">Mudar foto de perfil?</label>
                <input type="file" name="file_foto_perfil">

                <button  class="btn-salvar-foto">Salvar nova foto</button>
            </form>

            <a href="{{ route('equipe.upgrade') }}" class="btn-terapeuta">Mudar para conta profissional</a>

        </div>
@endsection