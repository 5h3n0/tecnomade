<head>
    <style>
        *{color:black;}
    </style>
</head>
<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['id_Pf'])) {
    echo "Você precisa estar logado como profissional para visualizar os serviços contratados.";
    exit;
}

$id_Pf = $_SESSION['id_Pf'];

// Consulta SQL para obter os serviços contratados em que o orçamento foi aceito
$sql = "SELECT s.*, o.id_solicitacao AS id_Contratacao, o.orcamento, se.nomeService, se.descService, u.usrName AS usrName, s.mensagem_cliente
        FROM solicitacoes_servico s
        INNER JOIN orcamento o ON s.id_solicitacao = o.id_solicitacao
        INNER JOIN services se ON s.id_Service = se.id_Service
        INNER JOIN users u ON s.id_Usr = u.id_Usr
        WHERE s.id_Pf = ? AND o.status = 'Aceito'
        AND NOT EXISTS (
            SELECT 1 FROM servicos_realizados sr
            WHERE sr.id_contratacao = o.id_solicitacao
        )";



$stmt = $conn->prepare($sql);

// Verificar se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    echo "Erro ao preparar a consulta: " . $conn->error;
    exit;
}

$stmt->bind_param("i", $id_Pf);

// Executar a consulta
if (!$stmt->execute()) {
    echo "Erro ao executar a consulta: " . $stmt->error;
    exit;
}

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $valor = $row['orcamento'];
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
        echo "<div class='card my-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Nome do Serviço: " . $row['nomeService'] . "</h5>";
        echo "<p class='card-text'>Descrição do Serviço: " . $row['descService'] . "</p>";
        echo "<p class='card-text'>Nome do Usuário: " . $row['usrName'] . "</p>";
        echo "<p class='card-text'>Texto do Pedido: " . $row['mensagem_cliente'] . "</p>";
        echo "<p class='card-text'>Orçamento: R$ $valor</p>";
        echo "<p class='card-text'>Data do Serviço: " . $row['data_Solicitacao'] . "</p>";
        echo "<form action='servicoRealizadoBd.php' method='POST'>";
        echo "<input type='hidden' name='id_Pf' value='" . $id_Pf . "'>";
        echo "<input type='hidden' name='id_Usr' value='" . $row['id_Usr'] . "'>";
        echo "<input type='hidden' name='id_Contratacao' value='" . $row['id_Contratacao'] . "'>";
        echo "<input type='hidden' name='id_Service' value='" . $row['id_Service'] . "'>";
        echo "<input type='hidden' name='data_contratacao' value='" . $row['data_Solicitacao'] . "'>";
        echo "<input type='hidden' name='data_realizacao' value='" . date('Y-m-d') . "'>";
        echo "<button type='submit' name='acao' value='concluir' class='btn btn-success'>Concluir Serviço</button>";
        echo "</form>";
        echo "</div>"; // Adicionando a tag de fechamento </div> para fechar a div do card-body
        echo "</div>"; // Adicionando a tag de fechamento </div> para fechar a div do card
    }
} else {
    echo "Não há serviços contratados com orçamento aceito.";
}
?>
