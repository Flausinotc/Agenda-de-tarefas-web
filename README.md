##Agenda de Tarefas
Este é um projeto simples para agendamento de tarefas do departamento técnico. Utiliza PHP para interação com o banco de dados MySQL e fornece uma interface amigável para visualização e manipulação das tarefas.

##Configuração do Banco de Dados
Antes de usar o sistema, certifique-se de configurar corretamente o acesso ao banco de dados. Abra o arquivo index.php e ajuste as configurações de conexão:

php
Copy code
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';
Altere os valores de $hostname, $username, $password, e $dbname conforme necessário para o seu ambiente.

##Requisitos
Certifique-se de ter as seguintes bibliotecas e recursos instalados:

Font Awesome - Para ícones.
Sortable - Biblioteca JavaScript para classificação de elementos arrastáveis.
jQuery - Biblioteca JavaScript para manipulação do DOM.
jQuery UI - Para efeitos visuais e interações.
Estilo
O estilo do sistema está definido no arquivo style_tarefa.css. Sinta-se à vontade para personalizar conforme suas preferências.

##Funcionalidades
Agendamento de tarefas.
Visualização das tarefas em andamento e concluídas.
Classificação arrastável das tarefas.
Conclusão de tarefas com comentários.
Cores Personalizadas
As cores de fundo para as listas "Atividades em andamento" e "Atividades Concluídas" podem ser ajustadas no código PHP usando a função obterCorFundo($status). Modifique conforme necessário no arquivo index.php.

##Como Usar
Configure o banco de dados.
Abra o arquivo index.php em um navegador da web.
Adicione novas tarefas clicando no ícone "+".
Arraste as tarefas entre as listas para atualizar sua ordem.
Conclua uma tarefa clicando no botão "Concluído" e fornecendo um comentário.

##Script de Envio de E-mails em Python
Este script Python é projetado para enviar e-mails por meio de um servidor SMTP. Certifique-se de fornecer as informações corretas do servidor SMTP e as credenciais de autenticação antes de usar o script.

##Configuração do Script
Abra o arquivo enviar_email.py e ajuste as seguintes variáveis conforme necessário:

python
Copy code
smtp_server = "ip_da_hospedagem"
smtp_port = 587
smtp_usuario = "seu_email"
smtp_senha = "!Mudar123"

remetente = "no_reply@ceopag.com.br"
Certifique-se de substituir ip_da_hospedagem, seu_email, e !Mudar123 pelos valores corretos.

Como Usar
Para usar o script, execute-o a partir da linha de comando com os seguintes argumentos:

bash
Copy code
python enviar_email.py <destinatario> <assunto> <mensagem>
Certifique-se de substituir <destinatario>, <assunto>, e <mensagem> pelos valores desejados.

##Dependências
Este script depende do módulo smtplib para comunicação com o servidor SMTP. Certifique-se de ter as bibliotecas necessárias instaladas antes de executar o script.

bash
Copy code
pip install secure-smtplib
Exemplo de Uso
bash
Copy code
python enviar_email.py usuario@example.com "Assunto do E-mail" "Corpo do E-mail"
Aviso
Este script deve ser usado com responsabilidade e em conformidade com as políticas de envio de e-mails do servidor SMTP utilizado.
