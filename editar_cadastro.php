<?php
    
    session_start();
    include_once('db.php');

    $logado = $_SESSION['cpf'];

    $sql = "SELECT * FROM tbl_pacientes WHERE cpf = '$logado'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $cpf = $user_data['cpf'];
            $nome = ucwords(strtolower($user_data['nome']));
            $sobrenome = ucwords(strtolower($user_data['sobrenome']));
            $email = $user_data['email'];
            $data_nascimento = $user_data['data_nascimento'];
            $sexo = $user_data['sexo'];
            $senha = $user_data['senha'];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Seus Dados</h2>
        <p class="subtitle">Mantenha seus dados sempre atualizados.</p>
        
        <form action="update.php" method="POST" id="register-form">
            <input type="hidden" name="cpf" value="<?php echo $cpf ?>">
            <input type="text" id="first-name" name="nome" class="input-field" placeholder="Nome" value="<?php echo $nome ?>">
            <input type="text" id="last-name" name="sobrenome" class="input-field" placeholder="Sobrenome" value="<?php echo $sobrenome ?>">
            <input type="email" id="email" name="email" class="input-field" placeholder="E-mail" value="<?php echo $email ?>">
            <input type="date" id="birth-date" name="data_nascimento" class="input-field" value="<?php echo $data_nascimento ?>">

            <div class="gender-container">
                <label>Sexo:</label>
                <label>
                    <input type="radio" name="sexo" value="Feminino" <?php echo ($sexo == 'Feminino') ? 'checked' : ''; ?>> Feminino
                </label>
                <label>
                    <input type="radio" name="sexo" value="Masculino" <?php echo ($sexo == 'Masculino') ? 'checked' : ''; ?>> Masculino
                </label>
                <label>
                    <input type="radio" name="sexo" value="Outro" <?php echo ($sexo == 'Outro') ? 'checked' : ''; ?>> Outro
                </label>
            </div>


            <input type="text" id="password" name="senha" class="input-field" placeholder="Senha" value="<?php echo $senha ?>">
            
            <button type="submit" name= "update" id="update">Salvar</button>
        </form>
    </div>

    <div class="navbar">
        <a href="principal.php"><img src="icones/home icon.jpg" alt="Home" class="nav-icon"></a>
        <a href="#"><img src="icones/carteira-de-identidade 1.png" alt="Carteirinha" class="nav-icon"></a>
        <a href="#"><img src="icones/informacoes 1.png" alt="Informações" class="nav-icon"></a>
        <a href="editar_cadastro.php"><img src="icones/settings icon.png" alt="Configurações" class="nav-icon"></a>
    </div>
</body>
</html>
