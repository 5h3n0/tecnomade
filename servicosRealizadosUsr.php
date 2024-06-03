<?php
session_start();
include_once "connect.php";




$id_Pf = $_SESSION['id_Pf'];

// Consulta para obter os serviços realizados associados ao id_Pf
$sql = "SELECT sr.*, c.valor AS orcamento, s.nomeService, s.descService, c.data_Contratacao, u.usrName AS nome_usuario, p.pfName,
    (SELECT mensagem_cliente FROM solicitacoes_servico ss WHERE ss.id_Service = sr.id_Service LIMIT 1) AS mensagem_cliente
    FROM servicos_realizados sr
    INNER JOIN contratacoes c ON sr.id_contratacao = c.id_Contratacao
    INNER JOIN services s ON c.id_Service = s.id_Service
    INNER JOIN users u ON c.id_Usr = u.id_Usr
    INNER JOIN prof p ON sr.id_Pf = p.id_Pf
    LEFT JOIN orcamento o ON sr.id_ServicoRealizado = o.id_solicitacao
    WHERE sr.id_Pf = $id_Pf";


$result = $conn->query($sql);
echo "<div class='realizados'>";
// Verifica se há serviços associados ao id_Pf
if ($result->num_rows > 0) {
    // Exibe os serviços
    while ($row = $result->fetch_assoc()) {
        echo "<div class='servico realizado'>";
        $data_realizacao = date('d/m/Y', strtotime($row['data_realizacao']));
        $data_contratacao = date('d/m/Y', strtotime($row['data_Contratacao']));

        $valor = $row['orcamento'];
        $valor = substr($valor, 0, -2);
        $valor = number_format($valor, 2, ',', '.');
        echo "<label class='lbl_realizados'>Serviço</label>";
        echo "<p class='dados_realizados'>" . $row['nomeService'] . "</p>";
        echo "<label class='lbl_realizados' id='desc_realizado'>Descrição do Serviço</label>";
        echo "<p class='dados_realizados'>" . $row['descService'] . "</p>";
        
        echo "<label class='lbl_realizados'>Profissional</label>";
        echo "<p class='dados_realizados'>" . $row['pfName'] . "</p>";
        // echo "<label class='lbl_realizados'>Mensagem Cliente  </label>";
        // echo "<p class='dados_realizados'>" . $row['mensagem_cliente'] . "</p>";
        echo "<label class='lbl_realizados'>Valor:  </label>";
        echo "<p class='dados_realizados'>R$ $valor </p>";
        echo "<div class='datas'>";
        echo "<div class='data_contratacao'>";

        echo "<label class='lbl_realizados'> Contratação</label>";
        echo "<p class='dados_realizados'> $data_contratacao</p>";
        echo "</div>";
        echo "<div class='data_realizacao'>";

        echo "<label class='lbl_realizados'>Realização </label>";
        echo "<p class='dados_realizados'> $data_realizacao</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='semServicos'>";
    echo "<p class='top'>Nenhum serviço encontrado para este usuário.</p>";
    echo "</div>";

}
echo "</div>";
?>
