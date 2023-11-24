<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'agenda_tarefas';

$conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

$sql = "SELECT * FROM tarefas ORDER BY ordem ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Tarefas</title>
    <!-- Include your CSS and JS libraries here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add other stylesheet and script links as needed -->
    <link rel="stylesheet" href="style_tarefa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css" integrity="sha256-cjZpXprW7l8eORs02GvSDgWTo5jTbdz4Z7vF6QR7kTc=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js" integrity="sha256-q1eUxzmRl41fNEe+RTDMEIb93sIyIcfFS2y52bMeiCc=" crossorigin="anonymous"></script>

    <style>

        body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        }

        .board {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .list {
            flex: 1;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cards-container {
            max-height: 500px;
            overflow-y: auto;
            background-color: #fb000000;
            border: 1px solid #ffffff00;

        }

        .card {
            margin: 10px;
            user-select: none;
            cursor: grab;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            transition: background-color 0.3s ease;
            font-size: 14px;
            margin-bottom: 5px;
            padding: 8px;
        }

        .card:hover {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 0;
        }

        .concluir-btn {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .concluir-btn:hover {
            background-color: #45a049;
        }
        .anexos-btn:hover {
            background-color: #45a049;
        }

        #addButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            font-size: 24px;
            padding: 10px;
            border-radius: 50%;
            text-align: center;
            text-decoration: none;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        #addButton:hover {
            background-color: #0056b3;
        }

        #addForm {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        input,
        button {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div id="colorPicker" style="position: fixed; top: 20px; left: 20px;"></div>

    <a href="criar_tarefa.php" id="addButton"><i class="fas fa-plus"></i></a>

    <form id="addForm" action="criar_tarefa.php" method="post" style="display: none;">
        <!-- Your form content here -->
    </form>

    <div class="board">
        <div class="list draggable-list" id="afazer-lista" style="background-color: <?php echo obterCorFundo('afazer'); ?>;">
            <h2 style="text-align: center;">Atividades em andamento</h2>
            <div class="cards-container">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $concluida = isset($row['concluida']) ? $row['concluida'] : false;
                        if (!$concluida) {
                            echo '<div class="card sortable" data-id="' . $row['id'] . '" style="background-color: ' . ';">';
                            echo '<p> Solicitante: ' . $row['cliente'] . '</p>';
                            echo '<h5>Relato: ' . $row['descricao'] . '</h5>';
                            echo '<p><strong>Data:</strong> ' . date('d/m/Y', strtotime($row['data_agendamento'])) . '</p>';
                            echo '<p><strong>Hora:</strong> ' . $row['hora_agendamento'] . '</p>';
                            echo '<button class="concluir-btn">Concluído</button>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>

        <br><br>

        <div class="list" id="concluido-lista" style="background-color: <?php echo obterCorFundo('concluido'); ?>;">
            <h2 style="text-align: center;">Atividades Concluídas</h2>
            <div class="cards-container">
                <?php
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $concluida = isset($row['concluida']) ? $row['concluida'] : false;
                    if ($concluida) {
                        echo '<div class="card sortable" data-id="' . $row['id'] . '" style="background-color: ' . ';">';
                        echo '<p> Solicitante: ' . $row['cliente'] . '</p>';
                        echo '<h5>Relato: ' . $row['descricao'] . '</h5>';
                        echo '<h5><strong>Data:</strong> ' . date('d/m/Y', strtotime($row['data_agendamento'])) . '</h5>';
                        echo '_';
                        echo '<p><strong>Concluido:</strong> ' . $row['comentarios'] . '</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

    <?php
        function obterCorFundo($status)
        {
            switch ($status) {
                case 'afazer':
                    return '#aae7ad'; 
                case 'concluido':
                    return '#d3f9da'; 
                default:
                    return '#f9f9f9'; 
            }
        }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var board = document.querySelector('.board');
            var lists = document.querySelectorAll('.list');

            lists.forEach(function (list) {
                setupList(list);
            });

            function setupList(list) {
                var sortable = new Sortable(list.querySelector('.cards-container'), {
                    group: 'list-group',
                    animation: 150,
                    handle: '.card',
                    onEnd: function (evt) {
                        var cardOrder = [];
                        list.querySelectorAll('.card').forEach(function (card, index) {
                            cardOrder.push({ id: card.getAttribute('data-id'), order: index });
                        });

                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'atualizar_ordem.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log('Ordem atualizada no banco de dados com sucesso.');
                            }
                        };
                        xhr.send('order=' + JSON.stringify(cardOrder));
                    }
                });

                list.querySelectorAll('.concluir-btn').forEach(function (button) {
                    button.addEventListener('click', function () {
                        var taskId = button.closest('.card').getAttribute('data-id');
                        showConfirmationPopup(taskId);
                    });
                });
            }

            function showConfirmationPopup(taskId) {
                var comment = prompt('O que foi resolvido?');
                if (comment !== null) {
                    addCommentAndCompleteTask(taskId, comment);
                }
            }

            function addCommentAndCompleteTask(taskId, comment) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'concluir_task.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log('Tarefa concluída e banco de dados atualizado com sucesso.');
                        location.reload();
                    }
                };
                xhr.send('id=' + taskId + '&comment=' + encodeURIComponent(comment));
            }
        });

        console.log('Dados enviados:', 'order=' + JSON.stringify(cardOrder));
    </script>
</body>
</html>
