@extends('layout.cadastro')

@section('etapa', 3)

@section('form-content')
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" class="form-control" required>

    @error('senha')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <label for="senhaConfirm">Confirmar senha:</label>
    <input type="password" name="senhaConfirm" id="senhaConfirm" class="form-control" required>

    @error('senhaConfirm')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <div class="checkbox-group">
        <div class="checkbox-row">
            <input type="checkbox" id="aceiteTermos" name="aceiteTermos" required>
            <label class="form-check-label" for="aceiteTermos">Aceito os Termos de Serviço</label>
        </div>
        
        <div class="checkbox-row">
            <input type="checkbox" id="aceitePolitica" name="aceitePolitica" required>
            <label class="form-check-label" for="aceitePolitica">Aceito a Política de Privacidade</label>
        </div>
    </div>
    @endsection