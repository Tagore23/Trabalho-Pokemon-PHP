<?php
$pdo = require 'conexao.php'; // Inclua o arquivo de conexão e atribua o retorno à variável $pdo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO usuarios (username, password) VALUES (?, ?)');
    if ($stmt->execute([$username, $password])) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<h2>Registrar</h2>
<form method="POST">
    <label for="username">Usuário:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Registrar</button>
</form>
<?php include 'includes/footer.php'; ?>
