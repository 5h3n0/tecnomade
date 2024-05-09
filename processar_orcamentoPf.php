<?php
session_start();

require_once 'connect.php';

// Verifica se o profissional está logado
if (!isset($_SESSION['id_Pf'])) {
    echo "Você precisa estar logado como profissional para processar o orçamento.";
    exit;
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id_solicitacao = $_POST['id_solicitacao'];
    $orcamento = $_POST['orcamento'];
    $orcamento = preg_replace('/[^0-9]/', '', $orcamento);
    
    // Limpa os dados de entrada para evitar injeção de SQL (NÃO É O IDEAL, MAS É O QUE VOCÊ QUER)
    $id_solicitacao = mysqli_real_escape_string($conn, $id_solicitacao);
    $orcamento = mysqli_real_escape_string($conn, $orcamento);
    
    // Insere o orçamento na tabela orcamento
    $sql = "INSERT INTO orcamento (id_solicitacao, id_Pf, orcamento) VALUES ('$id_solicitacao', '{$_SESSION['id_Pf']}', '$orcamento')";
    
    // Executa a consulta SQL
    if (mysqli_query($conn, $sql)) {
        // Atualiza o status da solicitação de serviço para 'Orçamento Enviado'
        $sql_update = "UPDATE solicitacoes_servico SET status = 'Orçamento Enviado' WHERE id_solicitacao = '$id_solicitacao'";
        if (mysqli_query($conn, $sql_update)) {
            header("Location:paginaDeServicosParaPrestador.php");
            exit;
        } else {
            echo "Erro ao atualizar o status da solicitação de serviço.";
        }
    } else {
        echo "Erro ao processar o orçamento.";
    }
} else {
    echo "O formulário não foi submetido corretamente.";
}
?>