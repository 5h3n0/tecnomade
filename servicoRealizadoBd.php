<?php
session_start();
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $id_Pf = $_POST['id_Pf'];
    $id_Usr = $_POST['id_Usr'];
    $id_Contratacao = $_POST['id_Contratacao'];
    $id_Service = $_POST['id_Service'];
    $data_realizacao = $_POST['data_realizacao'];
    $acao = $_POST['acao'];

    // Verificar se a ação é 'concluir'
    if ($acao == 'concluir') {
        // Verificar se o id_Contratacao existe na tabela contratacoes
        $sql_check = "SELECT id_Contratacao FROM contratacoes WHERE id_Contratacao = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("i", $id_Contratacao);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        if ($result_check->num_rows == 0) {
            echo "Erro: ID de Contratação inválido.";
            exit;
        }

        // Preparar e executar a consulta SQL para inserir os dados na tabela servicos_realizados
        $sql_insert = "INSERT INTO servicos_realizados (id_Pf, id_Usr, id_Contratacao, id_Service, data_realizacao) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iiiss", $id_Pf, $id_Usr, $id_Contratacao, $id_Service, $data_realizacao);
        if ($stmt_insert->execute()) {
            // Definir a notificação na sessão
            $_SESSION['notification'] = true;
            header("Location: paginaDeServicosParaPrestador.php");
            exit;
        } else {
            echo "Erro ao executar a consulta: " . $stmt_insert->error;
        }
    }
}
?>
