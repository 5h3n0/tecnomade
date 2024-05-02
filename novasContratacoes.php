<?php
session_start();
include_once("connect.php");

$id_Pf = $_SESSION['id_Pf'];

// Consultar o banco de dados
$sql = "SELECT c.id_contratacao, s.nomeService, s.descService, c.valor, c.descricao, c.data_Contratacao, u.usrName AS nome_usuario, c.id_Usr, c.id_Service
FROM contratacoes c 
INNER JOIN services s ON c.id_Service = s.id_Service 
INNER JOIN users u ON c.id_Usr = u.id_Usr
WHERE c.id_Pf = $id_Pf
AND NOT EXISTS (
    SELECT 1
    FROM servicos_realizados sr
    WHERE sr.id_contratacao = c.id_contratacao
)";

$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Serviços Contratados</title>
</head>

<body>
    <h1>Serviços Contratados</h1>
    <?php

    if ($result->num_rows > 0) {
        $_SESSION['nova_contratacao'] = true;
        while ($row = $result->fetch_assoc()) {
            $valor = $row['valor'];
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
            $data = $row['data_Contratacao'];
            $data = date('d/m/Y', strtotime($data));
            echo "Nome do cliente: " . $row["nome_usuario"] . "<br>";
            echo "Serviço: " . $row["nomeService"] . "<br>";
            echo "Descrição: " . $row["descService"] . "<br>";
            echo "Valor: R$ $valor <br>";
            echo "Descrição do serviço: " . $row["descricao"] . "<br>";
            echo "Data contratação: $data <br>";
            echo "<br>";
            echo "<form action='servicoRealizadoBd.php' method='post'>";
            echo "<input type='hidden' name='id_Pf' value='$id_Pf'>";
            echo "<input type='hidden' name='id_Usr' value='{$row['id_Usr']}'>";
            echo "<input type='hidden' name='id_Service' value='{$row['id_Service']}'>";
            echo "<input type='hidden' name='id_contratacao' value='{$row['id_contratacao']}'>";
            echo "<input type='submit' value='Validar Serviço'>";
            echo "</form>";

        }
    } else {
        $_SESSION['nova_contratacao'] = false;
        echo "Nenhum serviço contratado.";
    }

    $conn->close();
    ?>
</body>

</html>
