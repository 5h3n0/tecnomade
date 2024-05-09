<?php
session_start();

require_once 'connect.php';

if (!isset($_SESSION['id_Usr'])) {
    echo "Você precisa estar logado para processar os orçamentos.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Usr = $_SESSION['id_Usr'];
    $id_orcamento = $_POST['id_orcamento'];
    $acao = $_POST['acao']; // 'aceitar' ou 'rejeitar'

    // Verifica se o ID do usuário corresponde ao orçamento
    $sql = "SELECT s.id_Pf, s.id_service, o.orcamento FROM solicitacoes_servico s
            INNER JOIN orcamento o ON s.id_solicitacao = o.id_solicitacao
            WHERE o.id_orcamento = ? AND s.id_Usr = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_orcamento, $id_Usr);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // O ID do usuário corresponde ao orçamento
        $row = $result->fetch_assoc();
        $id_Pf = $row['id_Pf'];
        $id_service = $row['id_service'];
        $valor_orcamento = $row['orcamento']; // Valor do orçamento

        if ($acao === 'aceitar') {
            // Atualiza o status do orçamento para 'Aceito'
            $sql_update = "UPDATE orcamento SET status = 'Aceito' WHERE id_orcamento = ?";
        } else {
            // Atualiza o status do orçamento para 'Rejeitado'
            $sql_update = "UPDATE orcamento SET status = 'Rejeitado' WHERE id_orcamento = ?";
        }

        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("i", $id_orcamento);

        if ($stmt_update->execute()) {
            // Insere os dados na tabela contratacoes
            $data_contratacao = date("Y-m-d");

            $sql_insert_contratacoes = "INSERT INTO contratacoes (id_Pf, id_Usr, id_Service, valor, data_contratacao) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert_contratacoes = $conn->prepare($sql_insert_contratacoes);
            $stmt_insert_contratacoes->bind_param("iiids", $id_Pf, $id_Usr, $id_service, $valor_orcamento, $data_contratacao);

            if ($stmt_insert_contratacoes->execute()) {
                header("location: cartao.php");
            } else {
                echo "Erro ao inserir dados na tabela contratacoes: " . $stmt_insert_contratacoes->error;
            }
        } else {
            echo "Erro ao processar o orçamento: " . $stmt_update->error;
        }
    } else {
        echo "Ação não autorizada.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
