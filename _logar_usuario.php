<?php

$servername = "localhost";
$username = "root"; // nome no banco
$password = ""; // seha do banco (nao tem)
$dbname = "gestaoacademica";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coleta dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];
$role = $_POST['role'];

// Prepara e executa a consulta SQL
$sql = "SELECT senha FROM usuarios WHERE email = ? AND role = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $role);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hash);
    $stmt->fetch();
    if (password_verify($senha, $hash)) {
        echo "Login bem sucedido!";
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
