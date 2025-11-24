@extends('layout.config')

@section('config-content')
    {{-- CONTEÚDO DAS PÁGINAS --}}
        <h2 class="titulo-contasinfo">Acessibilidade</h2>

        <span class="line"></span>

        <div class="contas-opcoesinfo">
            <p class="info">Gerencie os aspectos da sua experiência com a Avena. Essas configurações afetam todas as contas da Avena neste navegador.</p>
        </div>

        <div class="caixas-direita">
            <div class="caixa-item">
                <div class="img-label">
                    <img src="/img/simbolomodoescuro.png" class="icone">
                    <p>Tema</p>
                </div>
                <div class="toggle-wrapper">
                    <label class="toggle">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            
            <div class="caixa-item">
                <div class="img-label">
                    <img src="/img/aumentarfonte.png" class="icone">
                <p>Aumentar tamanho da fonte</p>
                </div>
                
                <div class="slider-wrapper">
                    <input type="range" min="12" max="32" value="16" class="font-slider">
                </div>
            </div>
        </div>
    @endsection