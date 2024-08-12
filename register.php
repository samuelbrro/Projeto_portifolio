<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar ao banco de dados
    // Você precisa substituir pelos seus próprios detalhes de conexão
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
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verificar se o usuário ou email já existe
    $sql = "SELECT id FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Usuário ou email já existe.";
    } else {
        // Inserir novo usuário no banco de dados
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
