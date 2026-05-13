# Exemplo de Cadastro de Chamados

## Visão Geral

Este é um sistema simples de help desk para tickets construído com PHP e armazenamento em arquivo de texto. Inclui validação de login, criação de tickets, consulta de tickets e controle de sessão.

## Arquivos Principais

### `index.php`
- Exibe a tela de login.
- Submete credenciais para `valida_login.php`.
- Mostra mensagens de erro para login inválido ou acesso não autorizado.

### `valida_login.php`
- Carrega a lógica de login protegida de `protegidos/valida_login.php`.
- Valida email e senha contra uma lista de usuários hardcoded.
- Armazena dados de sessão do usuário em caso de sucesso e redireciona para `home.php`.

### `home.php`
- Requer validação de sessão.
- Fornece links para abrir um novo ticket ou consultar tickets existentes.
- Inclui um link de logout para `logoff.php`.

### `abrir_chamado.php`
- Mostra um formulário de criação de ticket com campos para título, categoria e descrição.
- Posta dados do ticket para `registra_chamado.php`.
- Exibe uma mensagem de sucesso após registro.

### `registra_chamado.php`
- Lê ID e perfil do usuário da sessão.
- Sanitiza valores substituindo `#` por `-`.
- Escreve o registro do ticket em `protegidos/registros_chamado.txt`.
- Usa `#` como separador de campo.
- Redireciona de volta para a página de abertura de ticket com `enviado=true`.

### `consultar_chamado.php`
- Requer validação de sessão.
- Lê `protegidos/registros_chamado.txt` linha por linha.
- Filtra tickets:
  - usuários de perfil 2 podem ver apenas seus próprios tickets;
  - outros usuários veem todos os tickets.
- Exibe título, categoria e descrição do ticket.

### `logoff.php`
- Destrói a sessão e retorna o usuário para a página de login.

## Arquivos de Backend Protegido

### `protegidos/valida_login.php`
- Implementa a lista de usuários de login.
- Define `$_SESSION['validado']`, `$_SESSION['id_usuario']`, e `$_SESSION['id_perfil']`.
- Contém quatro usuários de demonstração com email e senha `12345678`.

### `protegidos/registros_chamado.txt`
- Armazena registros de tickets em texto plano.
- Cada registro usa `#` como separador e termina com uma quebra de linha.

## Resumo do Comportamento

- A aplicação é um sistema de tickets baseado em PHP sem banco de dados.
- Login é hardcoded e baseado em sessão.
- Registros de tickets são adicionados a um arquivo de texto.
- O sistema suporta visibilidade de tickets específica do usuário baseada em perfil.