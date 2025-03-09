<?php

    if(isset($_POST['update']))
    {

        // Capturar os outros campos do formulário
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        $senha = $_POST['senha'];

        // Query SQL para atualizar os dados
        $sql = "UPDATE tbl_pacientes SET nome='$nome', sobrenome='$sobrenome', email='$email', data_nascimento='$data_nascimento', sexo='$sexo', senha='$senha' WHERE cpf='$logado'";

        // Executar a query
        $result = $conn->query($sql);

        // Verificar se a atualização foi bem-sucedida e redirecionar para a página principal
        if ($result) {
            header('Location: principal.php');
        } else {
            echo "Erro ao atualizar o cadastro.";
        }
    }
?>
