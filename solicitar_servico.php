<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o usuário está logado
    if(!isset($_SESSION['id_Usr'])) {
        echo "Você precisa estar logado para enviar uma solicitação de serviço.";
        exit;
    }

    // Obtém os dados do formulário
    $id_service = mysqli_real_escape_string($conn, $_POST['id_Service']);
    $id_Pf = mysqli_real_escape_string($conn, $_POST['id_Pf']);
    $id_Usr = $_SESSION['id_Usr'];
    $descricao_servico = mysqli_real_escape_string($conn, $_POST['descService']);
    $mensagem_cliente = mysqli_real_escape_string($conn, $_POST['pedidoUsr']);
    $data_Solicitacao = date("Y-m-d");

    // Prepara e executa a consulta SQL para inserir os dados na tabela solicitacoes_servico
    $sql = "INSERT INTO solicitacoes_servico (id_Service, id_Pf, id_Usr, descricao_servico, mensagem_cliente, data_Solicitacao) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisss", $id_service, $id_Pf, $id_Usr, $descricao_servico, $mensagem_cliente, $data_Solicitacao);

    if ($stmt->execute()) {
        // Redireciona para a página de confirmação
        header("Location: paginaDeServicosParaUsr.php");
    } else {
        // Em caso de erro, exibe uma mensagem de erro
        echo "Erro ao enviar a solicitação de serviço: " . $stmt->error;
    }
} else {
    // Se o formulário não foi submetido corretamente, exibe uma mensagem de erro
    echo "O formulário não foi submetido corretamente.";
}
?>
