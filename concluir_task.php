<?php
$taskId = $_POST['id'];
$comment = $_POST['comment'];

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Atualizar a tabela de tarefas para marcar como concluída e adicionar o comentário
$sql = "UPDATE tarefas SET concluida = 1, comentarios = '$comment' WHERE id = $taskId";

if ($conn->query($sql) === TRUE) {
    echo "Tarefa concluída com sucesso!";
} else {
    echo "Erro ao concluir a tarefa: " . $conn->error;
}

$conn->close();
?>
