<?php
    session_start();
    include_once('db.php');

    if((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($SESSION['cpf']);
        unset($SESSION['senha']);
        header('Location: Login.php');
    }

    $logado = $_SESSION['cpf'];

    // Consulta para buscar o nome do usuário no banco de dados
    $sql = "SELECT tbl_exames.nome_exame, tbl_exames.data_exame
        FROM tbl_exames
        INNER JOIN tbl_pacientes ON tbl_exames.cpf_paciente = tbl_pacientes.cpf
        WHERE tbl_pacientes.cpf = '$logado'
        ORDER BY tbl_exames.data_exame DESC";

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Exames</title>
    <link rel="stylesheet" href="style.css"> <!-- Arquivo de estilos -->
</head>
<body>
<body>
    <div class="header">
        <a href="principal.php"><img src="icones/ion_arrow-back.png" alt="Home" class="nav-icon"></a>
        <h2 class="title">Resultados de Exames</h2>
        <span class="menu-button">⋮</span>
    </div>

    <div class="table-container">
        <div class="table-header">
            <span class="column-title">Data</span>
            <span class="column-title">Exame</span>
            <span class="column-title"></span>
        </div>
        <?php
            while($user_data = mysqli_fetch_assoc($result))
            {
                echo '<div class="table-row">
                        <span class="table-cell">' . $user_data['data_exame'] . '</span>
                        <span class="table-cell">' . $user_data['nome_exame'] . '</span>
                        <button class="btn">Acessar</button>
                    </div>';
            }
        ?>
    </div>


    <div class="navbar">
        <a href="principal.php"><img src="icones/home icon.jpg" alt="Home" class="nav-icon"></a>
        <a href="#"><img src="icones/carteira-de-identidade 1.png" alt="Carteirinha" class="nav-icon"></a>
        <a href="#"><img src="icones/informacoes 1.png" alt="Informações" class="nav-icon"></a>
        <a href="editar_cadastro.php"><img src="icones/settings icon.png" alt="Configurações" class="nav-icon"></a>
    </div>
</body>
</html>
