<head>
    <link rel="stylesheet" href="./css/paginasDeServicoPf.css">
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
echo"<div class='contratacaoes'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $valor = $row['orcamento'];
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
            $data = $row['data_Solicitacao'];
                $data = date('d/m/Y', strtotime($data));
        echo "<div class='contratacao'>";
        echo"<label class='lbl_contratacao'>Serviço</label>";

        echo "<p class='dados_contratacao'>" . $row['nomeService'] . "</p>";
        echo"<label class='lbl_contratacao'>Descrição do Serviço</label>";
        echo "<p class='dados_contratacao' id='desc_service_contratacao'>" . $row['descService'] . "</p>";
        echo"<label class='lbl_contratacao'>Usuário</label>";
        echo "<p class='dados_contratacao'>" . $row['usrName'] . "</p>";
        echo"<label class='lbl_contratacao'>Mensagem do Cliente</label>";
        echo "<p class='dados_contratacao' id='msg_cliente_contratacao'>" . $row['mensagem_cliente'] . "</p>";
        echo"<label class='lbl_contratacao'>Orçamento</label>";

        echo "<p class='dados_contratacao'>R$ $valor</p>";
        echo"<label class='lbl_contratacao'>Contratação</label>";
        
        echo "<p class='dados_contratacao'>" .$data. "</p>";
        echo "<form action='servicoRealizadoBd.php' method='POST'>";
        echo "<input type='hidden' name='id_Pf' value='" . $id_Pf . "'>";
        echo "<input type='hidden' name='id_Usr' value='" . $row['id_Usr'] . "'>";
        echo "<input type='hidden' name='id_Contratacao' value='" . $row['id_Contratacao'] . "'>";
        echo "<input type='hidden' name='id_Service' value='" . $row['id_Service'] . "'>";
        echo "<input type='hidden' name='data_contratacao' value='" . $row['data_Solicitacao'] . "'>";
        echo "<input type='hidden' name='data_realizacao' value='" . date('Y-m-d') . "'>";
        echo "<button type='submit' name='acao' value='concluir' class='btn_success'>Concluir Serviço</button>";
        echo "</form>";
        echo "</div>"; 
    }
} else {
    echo"<div class='semServicos'>";
    echo "<p class='top'>Não há serviços contratados com orçamento aceito.</p>";
    echo"</div>";

}
echo "</div>"; 
?>
