<?php
require 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE username = ?');
    $stmt->execute([$username]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header('Location: menu.php');
        exit;
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<h2>Login</h2>
<form method="POST">
    <label for="username">Usuário:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>
<?php include 'includes/footer.php'; ?>
