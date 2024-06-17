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
    $vida = $_POST['vida'];
    $habilidade1 = $_POST['habilidade1'];
    $dano1 = $_POST['dano1'];
    $habilidade2 = $_POST['habilidade2'];
    $dano2 = $_POST['dano2'];
    $habilidade3 = $_POST['habilidade3'];
    $dano3 = $_POST['dano3'];
    $habilidade4 = $_POST['habilidade4'];
    $dano4 = $_POST['dano4'];

    $stmt = $pdo->prepare('UPDATE pokemons SET nome = ?, vida = ?, habilidade1 = ?, dano1 = ?, habilidade2 = ?, dano2 = ?, habilidade3 = ?, dano3 = ?, habilidade4 = ?, dano4 = ? WHERE id = ? AND usuario_id = ?');
    if ($stmt->execute([$nome, $vida, $habilidade1, $dano1, $habilidade2, $dano2, $habilidade3, $dano3, $habilidade4, $dano4, $id, $_SESSION['usuario_id']])) {
        echo "Pokémon atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar Pokémon.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<style>
    .form-group {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .form-group label {
        margin-right: 10px;
    }

    .form-group input {
        margin-right: 10px;
    }
</style>

<h2>Editar Pokémon</h2>
<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $pokemon['nome']; ?>" required>
    <label for="vida">Vida:</label>
    <input type="number" id="vida" name="vida" value="<?php echo $pokemon['vida']; ?>" required>
    <div class="form-group">
        <label for="habilidade1">Habilidade 1:</label>
        <input type="text" id="habilidade1" name="habilidade1" value="<?php echo $pokemon['habilidade1']; ?>" required>
        <label for="dano1">Dano da Habilidade 1:</label>
        <input type="number" id="dano1" name="dano1" value="<?php echo $pokemon['dano1']; ?>" required>
    </div>
    <div class="form-group">
        <label for="habilidade2">Habilidade 2:</label>
        <input type="text" id="habilidade2" name="habilidade2" value="<?php echo $pokemon['habilidade2']; ?>" required>
        <label for="dano2">Dano da Habilidade 2:</label>
        <input type="number" id="dano2" name="dano2" value="<?php echo $pokemon['dano2']; ?>" required>
    </div>
    <div class="form-group">
        <label for="habilidade3">Habilidade 3:</label>
        <input type="text" id="habilidade3" name="habilidade3" value="<?php echo $pokemon['habilidade3']; ?>" required>
        <label for="dano3">Dano da Habilidade 3:</label>
        <input type="number" id="dano3" name="dano3" value="<?php echo $pokemon['dano3']; ?>" required>
    </div>
    <div class="form-group">
        <label for="habilidade4">Habilidade 4:</label>
        <input type="text" id="habilidade4" name="habilidade4" value="<?php echo $pokemon['habilidade4']; ?>" required>
        <label for="dano4">Dano da Habilidade 4:</label>
        <input type="number" id="dano4" name="dano4" value="<?php echo $pokemon['dano4']; ?>" required>
    </div>
    <button type="submit">Atualizar</button>
</form>

<?php include 'includes/footer.php'; ?>
