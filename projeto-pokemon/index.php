<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste PHP</title>
    <style>

        body {
            background-color: #333;
            margin: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        h1 {
            color: white;
        }

        p{
            color: white;
        }

        a {
            color: black;
            font-size: 20px;
            border: solid 2px black;
            padding: 3px;
            border-radius: 4px;
            background-color: white;
        }

    </style>
</head>
<body>
    <h1>Simulador de batalhas Pokemon</h1>
    <p>Projeto de PHP - Grupo: Eduardo Zaduski, Tagore Nataniel, Gabriel Braga, Paulo Victor</p>
    <p>Junho de 2024 - Curso de análise e desenvolvimento de sistemas</p>
    <a href="login.php">Login</a>
    <a href="register.php">Nova conta</a>
    <br>
    <br>
    <img src="Battle.jpeg" alt="Batalha Pokemon">

    <?php
    echo "<p> </p>";
    ?>
</body>
</html>
