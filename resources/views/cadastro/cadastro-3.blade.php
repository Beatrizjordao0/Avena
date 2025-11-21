@extends('layout.cadastro')

@section('etapa', 3)

@section('form-content')
    <label>Senha</label>
    <input type="password" name="senha" class="form-control" required>

    @error('senha')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <label>Confirmar senha</label>
    <input type="password" name="senhaConfirm" class="form-control" required>

    @error('senhaConfirm')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <input type="checkbox" class="form-check-input" required>
    <label class="form-check-label">Aceito os Termos de Serviço</label>

    <input type="checkbox" class="form-check-input" required>
    <label class="form-check-label">Aceito a Política de Privacidade</label>
@endsection