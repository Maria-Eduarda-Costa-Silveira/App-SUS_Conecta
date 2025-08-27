<?php
    include_once('db.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["cpf"];
        $senha = $_POST["senha"];

        $sql = "SELECT id, nome, senha FROM tbl_pacientes WHERE cpf='$cpf'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($senha, $row["senha"])) { // Verificação segura
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["nome"];
                echo "<script>alert('Login bem-sucedido!'); window.location='dashboard.html';</script>";
            } else {
                echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado!'); window.history.back();</script>";
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="body-log">
    <div class="container">
        <h2 class="title">Bem-vindo ao</h2>
        <img src="icones/logo.png" alt="" height="150px" width="300px">
        <p class="subtitle">Faça login para continuar</p>
        
        <form action="testLogin.php" method="POST" id="login-form">
            <input type="text" id="cpf" name="cpf" class="input-field" placeholder="CPF">
            <input type="password" id="password" name="senha" class="input-field" placeholder="Senha">
            <button type="submit" name="submit" id="btn-log">Entrar</button>
        </form>

        <p class="register-text">Ainda não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>
</html>
