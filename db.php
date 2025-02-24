<?php
    $servername = "localhost"; // Altere se necessário
    $username = "root"; // Altere se necessário
    $password = "1842102.Duda"; // Altere se necessário
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