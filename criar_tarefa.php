<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link rel="stylesheet" href="style_tarefa.css">
    <style>
        .close-button {
            position: fixed;
            top: 10px;
            right: 10px;
            cursor: pointer;
            background-color: #45a049;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            font-size: 16px;
        }
    
    </style>
</head>
<body>
    <div class="close-button" onclick="redirectToIndex()">
        <span>X</span>
    </div>

    <form action="agendar.php" method="post">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required><br>

        <label for="cliente">Solicitante:</label>
        <input type="text" name="cliente" required><br>

        <label for="data_agendamento">Data:</label>
        <input type="date" name="data_agendamento" required><br>

        <label for="hora_agendamento">Hora:</label>
        <input type="time" name="hora_agendamento" required><br>

        <label for="file">Selecione um arquivo:</label>
        <input type="file" name="file" id="file">

         <div class="checkbox-container">
            <label for="lembrar_por_email">Receber lembrete por e-mail:</label>
            <input type="checkbox" id="lembrar_por_email" name="lembrar_por_email" onchange="mostrarEmailInput()">
        </div>

        <div id="campo_email" style="display: none;">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu E-mail">
        </div>

        <input type="submit" name="submit" value="Agendar">
    </form>

    <script>
        function mostrarEmailInput() {
            var checkbox = document.getElementById("lembrar_por_email");
            var campoEmail = document.getElementById("campo_email");

            if (checkbox.checked) {
                campoEmail.style.display = "block";
            } else {
                campoEmail.style.display = "none";
            }
        }
        function redirectToIndex() {
            window.location.href = 'index.php';
        }
    </script>

</body>
</html>
