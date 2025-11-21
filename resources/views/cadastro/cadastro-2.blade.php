
@extends('layout.cadastro')

@section('etapa', 2)

@section('form-content')
    <label>Email:</label>
    <input type="email" name="email" placeholder="exemplo@email.com" value="{{ old('email', session('cadastro.email')) }}">
    
    @error('email')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <label>Confirmar Email:</label>
    <input type="email" name="emailConfirm" placeholder="Confirme seu email" value="{{ old('emailConfirm', session('cadastro.emailConfirm')) }}">

     @error('emailConfirm')
        <div class="error-message">{{ $message }}</div>
    @enderror
    
@endsection
