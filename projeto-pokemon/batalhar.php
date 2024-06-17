<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
$pdo = require 'conexao.php';
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

    // Inicializar a vida dos Pokémon
    $pokemon1_vida = $pokemon1['vida'];
    $pokemon2_vida = $pokemon2['vida'];

    // Alternar ataques
    $turno = 0;
    echo "<h2>Combate entre {$pokemon1['nome']} e {$pokemon2['nome']}</h2>";
    while ($pokemon1_vida > 0 && $pokemon2_vida > 0) {
        if ($turno % 2 == 0) {
            // Pokémon 1 ataca
            $habilidade = "habilidade" . rand(1, 4);
            $dano = $pokemon1["dano" . substr($habilidade, -1)];
            $pokemon2_vida -= $dano;
            echo "<p>{$pokemon1['nome']} usou {$pokemon1[$habilidade]} causando $dano de dano. Vida do {$pokemon2['nome']}: $pokemon2_vida</p>";
        } else {
            // Pokémon 2 ataca
            $habilidade = "habilidade" . rand(1, 4);
            $dano = $pokemon2["dano" . substr($habilidade, -1)];
            $pokemon1_vida -= $dano;
            echo "<p>{$pokemon2['nome']} usou {$pokemon2[$habilidade]} causando $dano de dano. Vida do {$pokemon1['nome']}: $pokemon1_vida</p>";
        }
        $turno++;
    }

    // Determinar o vencedor
    if ($pokemon1_vida > 0) {
        echo "<h3>O vencedor é: {$pokemon1['nome']}</h3>";
    } else {
        echo "<h3>O vencedor é: {$pokemon2['nome']}</h3>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
