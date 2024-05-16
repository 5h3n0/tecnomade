<?php
session_start();

require_once 'connect.php';

if (!isset($_SESSION['id_Usr'])) {
    echo "Você precisa estar logado para visualizar os orçamentos.";
    exit;
}

$id_Usr = $_SESSION['id_Usr'];

// Consulta SQL para obter os orçamentos recebidos pelo usuário atual
$sql = "SELECT o.*, s.descricao_servico, s.mensagem_cliente, srv.nomeService 
FROM orcamento o 
INNER JOIN solicitacoes_servico s ON o.id_solicitacao = s.id_solicitacao 
INNER JOIN services srv ON s.id_Service = srv.id_Service 
WHERE s.id_Usr = ? AND o.status = 'Pendente';
";


$stmt = $conn->prepare($sql);

// Debugging: Verificar se a preparação da consulta retornou um objeto válido

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
</head>

<body>
    <?php

    if ($result->num_rows > 0) {
        echo "<div class='orcamentos'>";
        while ($row = $result->fetch_assoc()) {
            // Exibir cada orçamento em um card Bootstrap
            $valor = $row['orcamento'];
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
            echo "<div class='orcamento'>";
            echo "<label class='lbl_orcamento'>Serviço</label>";
            echo "<p class='dados_orcamento'>" . $row['nomeService'] . "</p>";
            echo "<label class='lbl_orcamento'>Descrição do Serviço</label>";
            echo "<p class='dados_orcamento' id='desc_orcamento'>" . $row['descricao_servico'] . "</p>";
            echo "<label class='lbl_orcamento'>Mensagem do Cliente</label>";
            echo "<p class='dados_orcamento'>" . $row['mensagem_cliente'] . "</p>";
            echo "<label class='lbl_orcamento'>Valor do Orçamento</label>";
            echo "<p class='dados_orcamento'>R$ $valor</p>";
            echo "<form action='processar_orcamentoUsr.php' method='POST'>";
            echo "<input type='hidden' name='id_orcamento' value='" . $row['id_orcamento'] . "'>";
            echo"<div class='btns_orcamento'>";
            echo "<button type='submit' name='acao' value='aceitar' class='btn btn-success'>Aceitar</button>";
            echo "<button type='submit' name='acao' value='rejeitar' class='btn btn-danger mx-2'>Rejeitar</button>";
            echo"</div>";
            echo "</form>";
            echo "</div>";

        }
        echo "</div>";
    } else {
        echo "<div class='semServicos'>";
        echo "<p>Não há orçamentos recebidos.</p>";
        echo "</div>";

    }
    ?>
</body>

</html>