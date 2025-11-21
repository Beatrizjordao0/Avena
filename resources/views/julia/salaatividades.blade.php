@extends('layout.base')

@section('content')

<div class="sala-container">

    <div class="lista-usuarios">
        <h2>Sala de atividades - Dra. Júlia Evelyn</h2>

        <div class="usuarios-scroll">

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Guilherm C.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Allissom C.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Livia M.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Julho H.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Beatriz J.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Arthur F.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Lucas B.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Paula H.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Felipe J.</span>
            </div>

            <div class="usuario-item">
                <img src="/img/user.png" class="avatar">
                <span>Juninho S.</span>
            </div>

        </div>
    </div>

    <div class="notificacoes-container">
        <div class="notif-header">
            <span>NOTIFICAÇÕES</span>
        </div>

        <div class="notificacoes-scroll">

            <div class="notif-data">ONTEM</div>

            <div class="notif-card">
                Guilherme C. NÃO <br> REALIZOU ATIVIDADE 01
                <span class="hora">15:06</span>
            </div>

            <div class="notif-card">
                Lucas B. NÃO <br> REALIZOU ATIVIDADE 05
                <span class="hora">18:51</span>
            </div>

            <div class="notif-data">HOJE</div>

            <div class="notif-card">
                Paula H. NÃO br REALIZOU ATIVIDADE 03
                <span class="hora">22:37</span>
            </div>

        </div>
    </div>

</div>



@endsection
