@extends('layout.config')

@section('config-content')
    <!-- MODAL DE ATUALIZAR CONTA PROFISSIONAL -->
    <div id="modal-prof" class="modal-overlay modal-terapeuta" style="display:none;">
        <div class="modal-box">
            <button class="modal-close" onclick="fecharModalProf()">x</button>

            <span>Atualize sua conta para perfil profissional</span>

            <form class="modal-form" 
                action="{{ route('equipe.storeUpgrade') }}" 
                method="POST" 
                enctype="multipart/form-data">
                @csrf

                <label for="cpf">CPF:</label>
                <input class="input" type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                
                <label id="file-label" class="img" for="file">Documento profissional (opcional):</label>
                <input class="file input" id="file" type="file" name="file_doc_prof">
                <p id="file-name" class="file-name">Nenhum arquivo selecionado</p>

                <button type="submit" class="btn-equipes">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        function abrirModalProf() {
            console.log("FUNFOU!");
            document.getElementById('modal-prof').style.display = 'flex';
        }


        function fecharModalProf() {
            document.getElementById('modal-prof').style.display = 'none';
        }

        // fechar clicando fora do modal
        document.addEventListener("click", function(e){
            const modal = document.getElementById("modal-prof");
            const box = document.querySelector("#modal-prof .modal-box");

            if (e.target === modal) {
                fecharModalProf();
            }
        });
    </script>
        <h2 class="titulo-contasinfo">Informações da conta</h2>
        <span class="line"></span>

        <!-- OPÇÕES DE CONTAS -->
        <div class="contas-opcoesinfo">
            <p class="info-bold">Nome de usuário</p>
            <p class="info">{{ $user->name }} {{ $user->sobrenome }}
            @if ($user->tipo_conta === 'T')
            - (Perfil Profissional)
            @endif
            </p>

            <p class="info-bold">E-mail</p>
            <p class="info">{{ $user->email }}</p>

            <p class="info-bold">Data de nascimento</p>
            <p class="info">{{ date('d/m/Y', strtotime($user->data_nascimento )) }}</p>


            <a href="{{ route('alterar.senha') }}" class="info-bold info-link">Alterar a sua senha?</a>
            
            <form action="{{ route('config.foto') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <label for="perfil" class="label-foto">Mudar foto de perfil?</label>
                <input id="perfil" type="file" name="file_foto_perfil"x>

                <button  class="btn-salvar-foto">Salvar nova foto</button>
            </form>

            @if ($user->tipo_conta === 'P')
            <button onclick="abrirModalProf()" class="btn-terapeuta">
                Atualizar Perfil Profissional
            </button>
            @endif

        </div>

        <script>
            const fileInput = document.getElementById("file");
            const fileLabel = document.getElementById("file-label");
            const fileName = document.getElementById("file-name");

            fileInput.addEventListener("change", () => {
                if (fileInput.files.length > 0) {
                    fileLabel.classList.add("selected"); // fica verdinho
                    fileName.textContent = fileInput.files[0].name; // mostra o nome
                } else {
                    fileLabel.classList.remove("selected"); // volta ao normal
                    fileName.textContent = "Nenhum arquivo selecionado";
                }
            });
        </script>

@endsection