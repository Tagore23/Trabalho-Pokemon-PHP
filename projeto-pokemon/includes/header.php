<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Pokémon</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Projeto Pokémon</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <li><a href="register.php">Registrar</a></li>
                <li><a href="login.php">Login</a></li>
            <?php else: ?>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="cadastrar_pokemon.php">Cadastrar Pokémon</a></li>
                <li><a href="batalhar.php">Batalhar</a></li>
                <li><a href="logout.php">Logout</a></li>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
