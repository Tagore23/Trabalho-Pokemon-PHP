<?php
$servername = "localhost"; 
$dbname = "usuario_id"; 

$conn = new mysqli($servername, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT nome FROM perfil WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}

$conn->close();
?>
