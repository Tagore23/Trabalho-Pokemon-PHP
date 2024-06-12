<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $habilidade1 = $_POST['habilidade1'];
    $habilidade2 = $_POST['habilidade2'];
    $habilidade3 = $_POST['habilidade3'];
    $habilidade4 = $_POST['habilidade4'];
    $usuario_id = $_SESSION['usuario_id'];

    $stmt = $pdo->prepare('INSERT INTO pokemons (usuario_id, nome, habilidade1, habilidade2, habilidade3, habilidade4) VALUES (?, ?, ?, ?, ?, ?)');
    if ($stmt->execute([$usuario_id, $nome, $habilidade1, $habilidade2, $habilidade3, $habilidade4])) {
        echo "Pokémon cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar Pokémon.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<h2>Cadastrar Pokémon</h2>
<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="habilidade1">Habilidade 1:</label>
    <input type="text" id="habilidade1" name="habilidade1" required>
    <label for="habilidade2">Habilidade 2:</label>
    <input type="text" id="habilidade2" name="habilidade2" required>
    <label for="habilidade3">Habilidade 3:</label>
    <input type="text" id="habilidade3" name="habilidade3" required>
    <label for="habilidade4">Habilidade 4:</label>
    <input type="text" id="habilidade4" name="habilidade4" required>
    <button type="submit">Cadastrar</button>
</form>
<?php include 'includes/footer.php'; ?>
