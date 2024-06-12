<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'conexao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM pokemons WHERE id = ? AND usuario_id = ?');
$stmt->execute([$id, $_SESSION['usuario_id']]);
$pokemon = $stmt->fetch();

if (!$pokemon) {
    echo "Pokémon não encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $habilidade1 = $_POST['habilidade1'];
    $habilidade2 = $_POST['habilidade2'];
    $habilidade3 = $_POST['habilidade3'];
    $habilidade4 = $_POST['habilidade4'];

    $stmt = $pdo->prepare('UPDATE pokemons SET nome = ?, habilidade1 = ?, habilidade2 = ?, habilidade3 = ?, habilidade4 = ? WHERE id = ? AND usuario_id = ?');
    if ($stmt->execute([$nome, $habilidade1, $habilidade2, $habilidade3, $habilidade4, $id, $_SESSION['usuario_id']])) {
        echo "Pokémon atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar Pokémon.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<h2>Editar Pokémon</h2>
<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $pokemon['nome']; ?>" required>
    <label for="habilidade1">Habilidade 1:</label>
    <input type="text" id="habilidade1" name="habilidade1" value="<?php echo $pokemon['habilidade1']; ?>" required
