@extends('layout.config')


@section('config-content')
<div class="contaprofisssional">
    <h1>Atualize sua conta para perfil profissional</h1>
    <form action="{{ route('equipe.storeUpgrade') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>CPF:</label>
        <input class="input" type="text" name="cpf" placeholder="Digite seu CPF" required>

        <label>Documento profissional (opcional):</label>
        <input class="input" type="file" name="file_doc_prof">

        <label>RG (opcional):</label>
        <input class="input" type="file" name="file_rg">

        <button type="submit" class="btn-criarprofissional">Enviar</button>
    </form>
</div>
@endsection
