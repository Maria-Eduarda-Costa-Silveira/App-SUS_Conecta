<?php
    session_start();
    include_once('db.php');

    if(isset($_GET['id'])) {
        $id_agendamento = $_GET['id'];

        // Aqui você executa a lógica para cancelar o agendamento com base no $id_agendamento
        // Exemplo hipotético:
        $sql = "DELETE FROM tbl_agendamentos WHERE id_agendamento = $id_agendamento";
        $result = $conn->query($sql);

        if($result) {
            // Agendamento cancelado com sucesso
            header('Location: ag_exames.php');
            exit();
        } else {
            // Tratamento de erro, se necessário
            echo "Erro ao cancelar o agendamento."
        }
    } else {
        // Caso o parâmetro id não seja fornecido na URL
        header('Location: ag_exames.php');
        exit();
    }
?>
