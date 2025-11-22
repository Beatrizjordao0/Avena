@extends('layout.base')

@section('content')
<img src="/img/logo-avena-removebg-preview-dark.png" class="logo-avena">

<div class="retangulo2">
    <h1>Transforme sua conta em Terapeuta</h1>
<br><br>
    <form action="{{ route('equipe.storeUpgrade') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>CPF:</label> <br>
        <input class="input-retangulo2" type="text" name="cpf" placeholder="Digite seu CPF" required>
<br>
        <label>Documento profissional (opcional):</label><br>
        <input class="input-retangulo2" type="file" name="file_doc_prof">
<br>
        <label>RG (opcional):</label><br>
        <input class="input-retangulo2" type="file" name="file_rg">
<br>
        <button type="submit" class="btn-criar2">Enviar</button>
    </form>
</div>
@endsection
