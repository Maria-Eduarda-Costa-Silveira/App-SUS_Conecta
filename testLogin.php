<?php

    session_start();
    //print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha']))
    {
        //Acessa
        include_once('db.php');

        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM tbl_pacientes WHERE cpf = '$cpf' AND senha = '$senha'";

        $result = $conn->query($sql);

        //print_r($result);
        if (mysqli_num_rows($result) < 1) 
        {
            unset($_SESSION['cpf']);
            unset($_SESSION['senha']);
            header('Location: Login.php');
        }
        else
        {
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            header('Location: principal.php');

        }
    }
    else {

        //Não acess
        header('Location: Login.php');
    }

?>
