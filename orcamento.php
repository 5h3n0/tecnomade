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
echo"<div class='orcamentos'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='orcamento'>";
        // echo "<p>ID da Solicitação: " . $row['id_solicitacao'] . "</p>";
        echo"<div class='campos_orcamento'>";
        echo"<label class='lbl_orcamento'>Descrição do Serviço</label>";
        echo "<p class='dados_orcamento' id='msg_cliente'> " . $row['descricao_servico'] . "</p>";
        echo"</div>";
        echo"<div class='campos_orcamento'>";
        echo"<label class='lbl_orcamento'>Mensagem do Cliente: </label>";
        echo "<p class='dados_orcamento'>" . $row['mensagem_cliente'] . "</p>";
        echo"</div>";
        echo"<div class='campos_orcamento'>";
        echo"<label class='lbl_orcamento'>Data da Solicitação: </label>";
        echo "<p class='dados_orcamento'>" . $row['data_Solicitacao'] . "</p>";
        echo"</div>";
        echo "<form class='form_orcamento' action='processar_orcamentoPf.php' method='POST'>";
        echo "<input type='hidden' name='id_solicitacao' value='" . $row['id_solicitacao'] . "'>";
        
        echo "<label for='orcamento' class='lbl_orcamento'>Orçamento:</label>";
        echo "<input type='text' placeholder='Insira o valor do orçamento aqui:' id='orcamento'  oninput='this.value = formatDin(this.value)' name='orcamento' required>";
        echo "<button type='submit' id='btn-env-orcamento'>Enviar Orçamento</button>";
        

        echo "</form>";
        echo "</div>";
    }
} else {
    echo"<div class='semServicos'>";

    echo "<p class='top'>Não há solicitações de serviço pendentes para você.</p>";
    echo"</div>";

}
echo"</div>";

?>
<script src="js/formatDin.js"></script>
