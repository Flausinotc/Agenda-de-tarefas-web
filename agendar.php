<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST["descricao"];
    $cliente = $_POST["cliente"];
    $data_agendamento = $_POST["data_agendamento"];
    $hora_agendamento = $_POST["hora_agendamento"];
    $lembrar_por_email = isset($_POST["lembrar_por_email"]) ? $_POST["lembrar_por_email"] : false;
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    if (isset($_FILES['imagem'])) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $diretorio_upload = 'C:/xampp/htdocs/agendamento/anexos_imagem/';
    
        // Verifique se há erros no upload
        if ($_FILES['imagem']['error'] != UPLOAD_ERR_OK) {
            echo "Erro no upload: " . $_FILES['imagem']['error'];
            exit;
        }
    
        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($imagem_tmp, $diretorio_upload . $imagem_nome)) {
            echo "Arquivo movido com sucesso.";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        // Lida com a situação em que nenhum arquivo foi enviado
        $imagem_nome = "";
    }


    // Verifica a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }


    if ($lembrar_por_email && !empty($email)) {
        $assunto = "Tarefa Criada - $cliente - $descricao";
        $data_formatada = date("d/m/Y", strtotime($data_agendamento));
    
        $data_hora_agendamento = "$data_agendamento $hora_agendamento";
        $data_agendamento_obj = new DateTime($data_hora_agendamento);
        $data_agendamento_obj->modify('-10 minutes');
        $data_hora_envio = $data_agendamento_obj->format('Y-m-d H:i');
    
        list($data_envio, $hora_envio) = explode(" ", $data_hora_envio);
    
        $mensagem = "Descrição da tarefa: $descricao Data: $data_formatada Hora: $hora_agendamento";
    
        $output = shell_exec("python3 enviar_email.py \"$email\" \"$assunto\" " . escapeshellarg($mensagem));
        
        echo "<pre>$output</pre>";
    }
}
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $diretorio_upload = 'caminho/do/seu/diretorio/upload/';
    move_uploaded_file($imagem_tmp, $diretorio_upload . $imagem_nome);

    // Adicionar o nome do arquivo ao banco de dados
    $sql = "INSERT INTO tarefas (descricao, cliente, data_agendamento, hora_agendamento, email, imagem_nome) 
            VALUES ('$descricao', '$cliente', '$data_agendamento', '$hora_agendamento', '$email', '$imagem_nome')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao agendar a tarefa: " . $conn->error;
    }

    $conn->close();

?>
