<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar ao banco de dados
    $host = 'localhost';
    $db = 'nome_do_banco';
    $user = 'usuario';
    $pass = 'senha';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Escapar e validar entradas
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Verificar se o usuário existe
    $sql = "SELECT id, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login bem-sucedido
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}
?>

