<?php
session_start();

require_once 'connect.php';

if (!isset($_SESSION['id_Usr'])) {
    echo "Você precisa estar logado para visualizar os orçamentos.";
    exit;
}

$id_Usr = $_SESSION['id_Usr'];

// Consulta SQL para obter os orçamentos recebidos pelo usuário atual
$sql = "SELECT o.*, s.descricao_servico, s.mensagem_cliente 
        FROM orcamento o
        INNER JOIN solicitacoes_servico s ON o.id_solicitacao = s.id_solicitacao
        WHERE s.id_Usr = ? AND o.status = 'Pendente'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_Usr);
$stmt->execute();
$result = $stmt->get_result();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos Recebidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        *{
            color:black;
        }
        
    </style>
</head>

<body>
    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Exibir cada orçamento em um card Bootstrap
            $valor = $row['orcamento'];
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
            echo "<div class='card my-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Descrição do Serviço: " . $row['descricao_servico'] . "</h5>";
            echo "<p class='card-text'>Mensagem do Cliente: " . $row['mensagem_cliente'] . "</p>";
            echo "<p class='card-text'>Valor do Orçamento: R$ $valor</p>";
            echo "<form action='processar_orcamentoUsr.php' method='POST'>";
            echo "<input type='hidden' name='id_orcamento' value='" . $row['id_orcamento'] . "'>";
            echo "<button type='submit' name='acao' value='aceitar' class='btn btn-success'>Aceitar</button>";
            echo "<button type='submit' name='acao' value='rejeitar' class='btn btn-danger mx-2'>Rejeitar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Não há orçamentos recebidos.";
    }
    ?>
</body>

</html>
