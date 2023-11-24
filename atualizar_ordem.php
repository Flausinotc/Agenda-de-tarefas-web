<?php
var_dump($_POST);
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


// atualizar_ordem.php

$orders = json_decode($_POST['order'], true);

foreach ($orders as $order) {
    $taskId = $order['id'];
    $newOrder = $order['order'];

    // Atualize a ordem no banco de dados
    $updateSql = "UPDATE tarefas SET ordem = $newOrder WHERE id = $taskId";
    $conn->query($updateSql);
}

// Envie uma resposta (opcional)
echo 'Ordem atualizada com sucesso';
?>
