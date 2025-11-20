@extends('layout.cadastro')

@section('etapa', 2)

@section('form-content')
    <label>Email:</label>
    <input type="email" name="email" placeholder="Gabriela@gmail.com">

    <label>Confime seu email:</label>
    <input type="email" name="emailConfirm" placeholder="Gabriela@gmail.com">

@endsection