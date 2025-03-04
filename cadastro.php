<?php
    if (isset($_POST['submit'])) 
    {
        /*print_r($_POST['cpf']);
        print_r($_POST['nome']);
        print_r($_POST['sobrenome']);
        print_r($_POST['email']);
        print_r($_POST['data_nascimento']);
        print_r($_POST['sexo']);
        print_r($_POST['senha']);*/

        include_once('db.php');

        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO tbl_pacientes(cpf, nome, sobrenome, email, data_nascimento, sexo, senha) 
              VALUES('$cpf', '$nome', '$sobrenome', '$email', '$data_nascimento', '$sexo', '$senha')";

        $result = mysqli_query($conn, $query);

        header('Location: Login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Criar Conta</h2>
        <p class="subtitle">Preencha seus dados para se cadastrar</p>
        
        <form action="cadastro.php" method="POST" id="register-form">
            <input type="text" id="cpf" name="cpf" class="input-field" placeholder="CPF" required>
            <input type="text" id="first-name" name="nome" class="input-field" placeholder="Nome" required>
            <input type="text" id="last-name" name="sobrenome" class="input-field" placeholder="Sobrenome" required>
            <input type="email" id="email" name="email" class="input-field" placeholder="E-mail" required>
            <input type="date" id="birth-date" name="data_nascimento" class="input-field" required>

            <div class="gender-container">
                <label>Sexo:</label>
                <label><input type="radio" name="sexo" value="Feminino"> Feminino</label>
                <label><input type="radio" name="sexo" value="Masculino"> Masculino</label>
                <label><input type="radio" name="sexo" value="Outro"> Outro</label>
            </div>

            <input type="password" id="password" name="senha" class="input-field" placeholder="Senha">
            
            <button type="submit" name= "submit" id="btn-log">Cadastrar</button>
        </form>

        <p class="register-text">Já tem uma conta? <a href="Login.php">Faça login</a></p>
    </div>
</body>
</html>
