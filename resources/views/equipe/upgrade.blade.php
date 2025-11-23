@extends('layout.base')

@section('content')
<img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avenaupgrade">

<div class="contaprofisssional">
    <h1>Atualize sua conta para perfil profissional</h1>
<br><br>
    <form action="{{ route('equipe.storeUpgrade') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>CPF:</label> <br>
        <input class="inputcpf" type="text" name="cpf" placeholder="Digite seu CPF" required>
<br>
        <label>Documento profissional (opcional):</label><br>
        <input class="inputdoc" type="file" name="file_doc_prof">
<br>
        <label>RG (opcional):</label><br>
        <input class="inputrg" type="file" name="file_rg">
<br>
        <button type="submit" class="btn-criarprofissional">Enviar</button>
    </form>
</div>
@endsection
