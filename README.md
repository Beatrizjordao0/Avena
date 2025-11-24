![Logo](https://private-user-images.githubusercontent.com/243010790/517956064-72c763a7-a0e1-4299-b4d3-4afba19ef784.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NjM5NjEyMzMsIm5iZiI6MTc2Mzk2MDkzMywicGF0aCI6Ii8yNDMwMTA3OTAvNTE3OTU2MDY0LTcyYzc2M2E3LWEwZTEtNDI5OS1iNGQzLTRhZmJhMTllZjc4NC5wbmc_WC1BbXotQWxnb3JpdGhtPUFXUzQtSE1BQy1TSEEyNTYmWC1BbXotQ3JlZGVudGlhbD1BS0lBVkNPRFlMU0E1M1BRSzRaQSUyRjIwMjUxMTI0JTJGdXMtZWFzdC0xJTJGczMlMkZhd3M0X3JlcXVlc3QmWC1BbXotRGF0ZT0yMDI1MTEyNFQwNTA4NTNaJlgtQW16LUV4cGlyZXM9MzAwJlgtQW16LVNpZ25hdHVyZT03NTRiMGQwMjUwYWRlZjE0NThkZGM5OTNmMmJmYWIxZjAzNTRhMGRhZjk3NTU1MDMyZTM3NzExMjQxZjZiNzkzJlgtQW16LVNpZ25lZEhlYWRlcnM9aG9zdCJ9.gWviW2nY-MQc0Cd-o0fSeaeicyY34NiQzT47nX9WWF4)

# AVENA

O Avena é um sistema web voltado para profissionais e pacientes que desejam organizar, acompanhar e gerenciar atividades, equipes e planos de acompanhamento.
Ele permite que profissionais criem e administrem equipes, visualizem notificações e monitorem atividades, enquanto pacientes conseguem ingressar em equipes, visualizar suas atividades semanais e receber orientações personalizadas.

O objetivo do projeto é oferecer uma ferramenta simples, intuitiva e centralizada para facilitar a comunicação e o acompanhamento entre profissionais de saúde e seus pacientes.

## Stack utilizada

**Front-end:** HTML5, CSS3, JavaScript, PHP

**Back-end:** PHP, Laravel

**Banco de dados:** MySQL

**Ferramentas & Ambiente de desenvolvimento:** Git, GitHub, VS Code, GitHub Codespaces, Canva (somente para design)

## Documentação de cores

| Cor          | Hexadecimal |
| ------------ | ----------- |
| Cor primária | #2f415a     |
| Cor fundo    | #7fa5b2     |
| Cor fundo    | #a1d1c1     |

## Funcionalidades

-   Cadastro de usuário — criação de conta com informações básicas.
-   Login e autenticação — acesso seguro ao sistema.
-   Gestão de equipes
-   Criar nova equipe
-   Ingressar em equipes existentes por código
-   Visualizar integrantes
-   Agenda semanal
-   Registro de atividades por dia da semana
-   Edição e exclusão de atividades
-   Plano Profissional
-   Definição de metas
-   Acompanhamento de progresso
-   Configurações
-   Alterar dados pessoais
-   Ajustar preferências de conta
-   Acessibilidade
-   Notificações — visualização das atualizações importantes.
-   Interface responsiva — adaptada para desktop e mobile.

## Aprendizados

Durante o desenvolvimento deste projeto, a equipe adquiriu experiência prática em diversas áreas, incluindo:

-   Trabalho com Git e GitHub, envolvendo versionamento, resolução de conflitos e colaboração em equipe.
-   Organização de código e estrutura de pastas, seguindo boas práticas para manter o projeto escalável.
-   Construção de interfaces responsivas, garantindo boa usabilidade em diferentes dispositivos.
-   Integração de front-end e back-end, entendendo a comunicação entre cliente e servidor.
-   Implementação de autenticação e controle de acesso, reforçando conhecimentos em segurança.
-   Uso de ferramentas de desenvolvimento, como VS Code e GitHub Codespaces, para colaboração eficiente.
-   Criação e documentação de APIs, aplicando princípios REST.
-   Gerenciamento de estados e fluxo de dados, aprofundando a lógica de funcionamento da aplicação.

## Uso/Exemplos

```
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaginasController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function jointeam()
    {
        return view('jointeam');
    }

    public function planopaciente()
    {
        return view('planopaciente');
    }

    public function criarequipe()
    {
        return view('criarequipe');
    }

    public function tituloequipe()
    {
        return view('tituloequipe');
    }

    public function equipecriada()
    {
        return view('equipecriada');
    }

    public function equipesneuro()
    {
        return view('equipesneuro');
    }

    public function salaatividades()
    {
        return view('salaatividades');
    }

    public function contas()
    {
        $user = Auth::user();

        return view('config.contas', [
            'user' => $user
        ]);
    }

    public function informacoesconta()
    {
        $user = Auth::user();

        return view('config.informacoesconta', [
            'user' => $user
        ]);
    }

    public function privacidade()
    {
        $user = Auth::user();

        return view('config.privacidade', [
            'user' => $user
        ]);
    }

    public function acessibilidade()
    {
        $user = Auth::user();

        return view('config.acessibilidade', [
            'user' => $user
        ]);
    }
}
```

## Rodando localmente

Clone o repositório

```bash
  git clone https://github.com/Beatrizjordao0/Avena.git
```

Entre no diretório do projeto

```bash
  cd avena
```

Instale as dependências

```bash
  composer install
```

Configure o arquivo de ambiente

```bash
  cp .env.example .env
```

Gere a chave da aplicação

```bash
  php artisan key:generate
```

Inicie o servidor local

```bash
  php artisan serve
```

## Documentação - Pré-projeto

[Documentação](https://docs.google.com/document/d/1MAZcw-ZVHtn_hqzkCTLxhH-PN7wNwpt2Zu3t-jMoGN4/edit?usp=sharing)

## Apêndice

Este apêndice reúne informações complementares relacionadas ao projeto, que podem ser úteis para manutenção, referência futura ou entendimento técnico adicional.

Estrutura do Projeto:

A aplicação segue a estrutura padrão do Laravel, organizada em:

-   app/ – Contém a lógica de negócio (Controllers, Models, Middleware).
-   resources/views/ – Arquivos Blade responsáveis pela interface.
-   routes/web.php – Declaração das rotas da aplicação.
-   public/ – Arquivos públicos (imagens, CSS, JS).
-   database/ – Migrações e seeders.

Requisitos do Sistema -
Para garantir o funcionamento adequado, recomenda-se:

-   PHP 8.x ou superior
-   Composer atualizado

A aplicação pode ser iniciada em ambiente de desenvolvimento utilizando o comando php artisan serve.

## Roadmap

Esta seção apresenta funcionalidades e melhorias planejadas para futuras versões do projeto.

-   Melhorar compatibilidade entre diferentes navegadores e dispositivos.
-   Aprimorar acessibilidade seguindo melhores práticas (WCAG).
-   Completar o back-end
-   Finalizar o banco de dados
-   Terminar as funcionalidades restantes
-   Padronizar e organizar o código
-   Implementar feedback visual de sucesso e erro
-   Implementar notificações internas e por e-mail.
-   Implementar melhorias de UI/UX nas principais telas

## Autores

-   Alyson Coutinho - 01812644
-   Arthur Fernandes - 01848451
-   Beatriz Jordão - 01812582
-   Júlia Evelyn - 01803734
-   Lívia Moreno - 01800123
