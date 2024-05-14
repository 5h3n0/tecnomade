<?php
include_once ("connect.php");
session_start();
$id_Usr = $_SESSION['id_Usr'];
?>

<?php
$sql = "SELECT sr.*, s.nomeService, s.descService, c.valor, c.data_Contratacao, cat.nome AS nomeCategoria
                FROM servicos_realizados sr
                INNER JOIN contratacoes c ON sr.id_contratacao = c.id_Contratacao
                INNER JOIN services s ON c.id_Service = s.id_Service 
                INNER JOIN categorias cat ON s.id_Cat = cat.id_Cat
                WHERE sr.id_Usr = $id_Usr";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<div class='realizados'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='realizado'>";
        $valor = $row['valor'];
        $valor = substr($valor, 0, -2);
        $valor = number_format($valor, 2, ',', '.');
        $data_contratacao = $row['data_Contratacao'];
        $data_contratacao = date('d/m/Y', strtotime($data_contratacao));
        $data_realizacao = $row['data_realizacao'];
        $data_realizacao = date('d/m/Y', strtotime($data_realizacao));
        echo "<label class='lbl_realizados'>Serviço</label>";
        echo "<p class='dados_realizados'>" . $row["nomeService"] . "gsdgsdg</p>";
        echo "<label class='lbl_realizados'>Descrição</label>";

        echo "<p class='dados_realizados'>" . $row["descService"] . "</p>";
        echo "<label class='lbl_realizados'>Categoria: </label>";
        echo "<p class='dados_realizados'>" . $row["nomeCategoria"] . "</p>";
        echo "<label class='lbl_realizados'>Valor</label>";

        echo "<p class='dados_realizados'>R$ $valor </p>";
        // Se houver descrição de contratação, descomente a linha abaixo
        // echo "Descrição da Contratação: " . $row["mensagem_cliente"]. "</p>";
        echo "<div class='datas'>";
        echo "<div class='data_contratacao'>";
        echo "<label class='lbl_realizados'>Contratação</label>";
        echo "<p class='dados_realizados'> $data_contratacao </p>";
        echo "</div>";

        echo "<div class='data_realizacao'>";
        echo "<label class='lbl_realizados'>Realização</label>";
        echo "<p class='dados_realizados'> $data_realizacao </p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {

    echo "<div class='semServicos'>";
    
    echo "<p>Nenhum serviço realizado.</p>";
    echo "</div>";

}
$conn->close();
?>
</div>