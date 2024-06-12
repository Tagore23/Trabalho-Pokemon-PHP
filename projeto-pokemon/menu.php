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
<h2>Menu Principal</h2>
<h3>Seus Pokémons</h3>
<ul>
    <?php foreach ($pokemons as $pokemon): ?>
        <li><?php echo $pokemon['nome']; ?> - <a href="editar_pokemon.php?id=<?php echo $pokemon['id']; ?>">Editar</a></li>
    <?php endforeach; ?>
</ul>
<?php include 'includes/footer.php'; ?>
