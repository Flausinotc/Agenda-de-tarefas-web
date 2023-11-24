# Agenda de Tarefas

Este é um projeto simples para agendamento de tarefas do departamento técnico. Utiliza PHP para interação com o banco de dados MySQL e fornece uma interface amigável para visualização e manipulação das tarefas.

## Configuração do Banco de Dados

Antes de usar o sistema, certifique-se de configurar corretamente o acesso ao banco de dados. Abra o arquivo `index.php` e ajuste as configurações de conexão:

```php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';
```

Altere os valores de `$hostname`, `$username`, `$password`, e `$dbname` conforme necessário para o seu ambiente.

## Requisitos

Certifique-se de ter as seguintes bibliotecas e recursos instalados:

- [Font Awesome](https://fontawesome.com/) - Para ícones.
- [Sortable](https://github.com/SortableJS/Sortable) - Biblioteca JavaScript para classificação de elementos arrastáveis.
- [jQuery](https://jquery.com/) - Biblioteca JavaScript para manipulação do DOM.
- [jQuery UI](https://jqueryui.com/) - Para efeitos visuais e interações.

## Estilo

O estilo do sistema está definido no arquivo `style_tarefa.css`. Sinta-se à vontade para personalizar conforme suas preferências.

## Funcionalidades

- Agendamento de tarefas.
- Visualização das tarefas em andamento e concluídas.
- Classificação arrastável das tarefas.
- Conclusão de tarefas com comentários.

## Cores Personalizadas

As cores de fundo para as listas "Atividades em andamento" e "Atividades Concluídas" podem ser ajustadas no código PHP usando a função `obterCorFundo($status)`. Modifique conforme necessário no arquivo `index.php`.

## Como Usar

1. Configure o banco de dados.
2. Abra o arquivo `index.php` em um navegador da web.
3. Adicione novas tarefas clicando no ícone "+".
4. Arraste as tarefas entre as listas para atualizar sua ordem.
5. Conclua uma tarefa clicando no botão "Concluído" e fornecendo um comentário.

# Script de Envio de E-mails em Python

Este script Python é projetado para enviar e-mails por meio de um servidor SMTP. Certifique-se de fornecer as informações corretas do servidor SMTP e as credenciais de autenticação antes de usar o script.

## Configuração do Script

Abra o arquivo `enviar_email.py` e ajuste as seguintes variáveis conforme necessário:

```python
smtp_server = "ip_da_hospedagem"
smtp_port = 587
smtp_usuario = "seu_email"
smtp_senha = "!Mudar123"

remetente = "no_reply@ceopag.com.br"
```

Certifique-se de substituir `ip_da_hospedagem`, `seu_email`, e `!Mudar123` pelos valores corretos.

## Como Usar

Para usar o script, execute-o a partir da linha de comando com os seguintes argumentos:

```bash
python enviar_email.py <destinatario> <assunto> <mensagem>
```

Certifique-se de substituir `<destinatario>`, `<assunto>`, e `<mensagem>` pelos valores desejados.

## Dependências

Este script depende do módulo `smtplib` para comunicação com o servidor SMTP. Certifique-se de ter as bibliotecas necessárias instaladas antes de executar o script.

```bash
pip install secure-smtplib
```

## Exemplo de Uso

```bash
python enviar_email.py usuario@example.com "Assunto do E-mail" "Corpo do E-mail"
```

## Aviso

Este script deve ser usado com responsabilidade e em conformidade com as políticas de envio de e-mails do servidor SMTP utilizado.

## Atualizações

Realizei uma nova atualização, onde é possivel edicionar atualizações aos cards e no banco de dados, em breve lançarei!
---

