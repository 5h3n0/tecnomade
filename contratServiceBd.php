<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id_Usr'])) {
        $id_service = mysqli_real_escape_string($conn, $_POST['id_Service']);
        $id_Pf = mysqli_real_escape_string($conn, $_POST['id_Pf']);
        $id_Usr = $_SESSION['id_Usr'];
        $descricao_servico = mysqli_real_escape_string($conn, $_POST['descService']);
        $mensagem_cliente = mysqli_real_escape_string($conn, $_POST['pedidoUsr']);
        $data_Contratacao = date("Y-m-d");

    
        $sql = "INSERT INTO contratacoes (id_Service, id_Pf, id_Usr, descricao_servico, mensagem_cliente, data_Contratacao) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iiisss", $id_service, $id_Pf, $id_Usr, $descricao_servico, $mensagem_cliente, $data_Contratacao);
            if ($stmt->execute()) {
                header("Location: paginaDeServicosParaUsr.php");
                exit();
            } else {
                echo "Erro ao inserir os dados: " . $stmt->error;
            }
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        echo "Erro: Sessão ou id_Usr não definidos.";
    }
} else {
    echo "O formulário não foi submetido corretamente.";
}
?>
