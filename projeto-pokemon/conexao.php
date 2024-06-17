<?php
// conexao.php
$dsn = 'mysql:host=localhost;dbname=projeto_pokemon';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo; // Retorne o objeto PDO
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit; // Saia do script em caso de falha na conexão
}
?>
