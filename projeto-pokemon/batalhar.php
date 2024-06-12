<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
require 'conexao.php';
$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare('SELECT * FROM pokemons WHERE usuario_id = ?');
$stmt->execute([$usuario_id]);
$pokemons = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<h1>Batalha Pokémon</h1>
<form method="POST">
    <label for="pokemon1">Escolha seu Pokémon:</label>
    <select name="pokemon1" id="pokemon1">
        <?php foreach ($pokemons as $pokemon): ?>
            <option value="<?php echo $pokemon['id']; ?>"><?php echo $pokemon['nome']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="pokemon2">Escolha o Pokémon oponente:</label>
    <select name="pokemon2" id="pokemon2">
        <?php foreach ($pokemons as $pokemon): ?>
            <option value="<?php echo $pokemon['id']; ?>"><?php echo $pokemon['nome']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Lutar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pokemon1_id = $_POST['pokemon1'];
    $pokemon2_id = $_POST['pokemon2'];

    $stmt = $pdo->prepare('SELECT * FROM pokemons WHERE id = ?');
    $stmt->execute([$pokemon1_id]);
    $pokemon1 = $stmt->fetch();

    $stmt = $pdo->prepare('SELECT * FROM pokemons WHERE id = ?');
    $stmt->execute([$pokemon2_id]);
    $pokemon2 = $stmt->fetch();

    // Simulação básica de combate
    echo "<h2>Combate entre {$pokemon1['nome']} e {$pokemon2['nome']}</h2>";
    $vencedor = rand(0, 1) ? $pokemon1['nome'] : $pokemon2['nome'];
    echo "<h3>O vencedor é: $vencedor</h3>";
}
?>

<?php include 'includes/footer.php'; ?>
