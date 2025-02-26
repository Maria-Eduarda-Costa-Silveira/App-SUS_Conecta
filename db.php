<?php
    $servername = "db-app-sus.c38oyqkkyjym.us-east-1.rds.amazonaws.com"; // Altere se necessário
    $username = "admin"; // Altere se necessário
    $password = "ASTzysV0xAMgszFYLiNe"; // Altere se necessário
    $dbname = "db_app-sus";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    /*if ($conn->connect_error) {
        echo "Erro";
    }
    else {
        echo "Conexão Efetuada com Sucesso!";
    }*/
?>
