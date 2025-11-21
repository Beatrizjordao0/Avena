@extends('layout.cadastro')

@section('etapa', 1)

@section('form-content')
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Gabriela" value="{{ old('name', session('cadastro.name')) }}">

    <label>Sobrenome:</label>
    <input type="text" name="sobrenome" placeholder="Silva" value="{{ old('sobrenome', session('cadastro.sobrenome')) }}">


    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento', session('cadastro.data_nascimento')) }}">
@endsection
