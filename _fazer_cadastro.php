<?php

$servername = "localhost";
$username = "root"; // nome usuario
$password = ""; // senha no banco, nao tem
$dbname = "gestaoacademica";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coleta dados do formulário
$email = $_POST['email-novo'];
$senha = password_hash($_POST['senha-nova'], PASSWORD_DEFAULT); // Criptografa a senha
$role = $_POST['role-novo'];

// Prepara e executa a consulta SQL
$sql = "INSERT INTO usuarios (email, senha, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $senha, $role);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>

?>
