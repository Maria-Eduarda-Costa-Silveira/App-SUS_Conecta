<?php

    session_start();
    //print_r($_SESSION);

    if((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($SESSION['cpf']);
        unset($SESSION['senha']);
        header('Location: Login.php');
    }

    include_once('db.php');
    $logado = $_SESSION['cpf'];

    // Consulta para buscar o nome do usuário no banco de dados
    $sql = "SELECT nome FROM tbl_pacientes WHERE cpf = '$logado'";
    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $nome = ucwords(strtolower($row['nome']));
        $_SESSION['nome'] = $nome; // Armazena o nome na sessão
    } 
    else 
    {
        $nome = "Paciente"; // Nome padrão caso algo dê errado
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <?php 
            echo "<span class='user-greeting'>Olá, $nome</span>"; 
        ?>
        <a href="sair.php" class="btn-cancelar">Sair</a>
    </div>

    <p class="title">Escolha <strong>Um Serviço</strong></p>

    <div class="service-container">
        <a href="exames.php">
            <div class="service">
                <span>Resultados de Exames</span>
                <img src="icones/bloco-de-anotacoes 1.png" alt="Icone">
            </div>
        </a>

        <a href="receita.php">
            <div class="service">
                <span>Receitas Médicas</span>
                <img src="icones/receita 1.png" alt="Icone">
            </div>
        </a>

        <a href="ag_exames.php">
            <div class="service">
                <span>Próximos Agendamentos</span>
                <img src="icones/calendario 1.png" alt="Icone">
            </div>
        </a>

        <div class="service">
            <span>Histórico</span>
            <img src="icones/historia 1.png" alt="Icone">
        </div>
    </div>

    <div class="navbar">
        <a href="principal.php"><img src="icones/home icon.jpg" alt="Home" class="nav-icon"></a>
        <a href="#"><img src="icones/carteira-de-identidade 1.png" alt="Carteirinha" class="nav-icon"></a>
        <a href="#"><img src="icones/informacoes 1.png" alt="Informações" class="nav-icon"></a>
        <a href="editar_cadastro.php"><img src="icones/settings icon.png" alt="Configurações" class="nav-icon"></a>
    </div>
</body>
</html>
