@extends('layout.cadastro')

@section('etapa', 1)

@section('form-content')
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Gabriela">

    <label>Sobrenome:</label>
    <input type="text" name="sobrenome" placeholder="Silva">

    <label>CPF:</label>
    <input type="text" name="cpf" placeholder="000.000.000-00">

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" placeholder="00/00/0000">

@endsection