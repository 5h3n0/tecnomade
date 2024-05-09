<?php
session_start();

require_once 'connect.php';

if (!isset($_SESSION['id_Pf'])) {
    echo "Você precisa estar logado como profissional para visualizar as solicitações.";
    exit;
}

$id_Pf = $_SESSION['id_Pf'];

$sql = "SELECT * FROM solicitacoes_servico WHERE id_Pf = ? AND status = 'Pendente'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_Pf);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p>ID da Solicitação: " . $row['id_solicitacao'] . "</p>";
        echo "<p>Descrição do Serviço: " . $row['descricao_servico'] . "</p>";
        echo "<p>Mensagem do Cliente: " . $row['mensagem_cliente'] . "</p>";
        echo "<p>Data da Solicitação: " . $row['data_Solicitacao'] . "</p>";
        echo "<form action='processar_orcamentoPf.php' method='POST'>";
        echo "<input type='hidden' name='id_solicitacao' value='" . $row['id_solicitacao'] . "'>";
        echo "<label for='orcamento'>Orçamento:</label>";
        echo "<input type='text' id='orcamento'  oninput='this.value = formatDin(this.value)' name='orcamento' required>";
        echo "<button type='submit'>Enviar Orçamento</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "Não há solicitações de serviço pendentes para você.";
}
?>
<script src="js/formatDin.js"></script>
