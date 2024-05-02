<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Contratados</title>
    <!-- Adicione links para CSS ou Bootstrap aqui, se necessário -->
</head>
<body>
    <h1>Serviços Contratados</h1>
    <h2>Serviços em Andamento</h2>
    <ul>
        <?php
        include_once("connect.php");
        session_start();
        $id_Usr = $_SESSION['id_Usr'];
        $sql = "SELECT s.nomeService, s.descService, c.valor, c.descricao, c.data_Contratacao 
                FROM contratacoes c 
                INNER JOIN services s ON c.id_Service = s.id_Service 
                WHERE c.id_Usr = $id_Usr AND c.id_Contratacao NOT IN (SELECT id_contratacao FROM servicos_realizados)";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $valor = $row['valor'];
                $valor = substr($valor, 0, -2);
                $valor = number_format($valor, 2, ',', '.');
                $data = $row['data_Contratacao'];
                $data = date('d/m/Y', strtotime($data));
                echo "<li>";
                echo "Serviço: " . $row["nomeService"]. "<br>";
                echo "Descrição: " . $row["descService"]. "<br>";
                echo "Valor: R$ $valor <br>";
                echo "Descrição da Contratação: " . $row["descricao"]. "<br>";
                echo "Data de Contratação: $data <br>";
                echo "</li>";
            }
        } else {
            echo "<li>Nenhum serviço em andamento.</li>";
        }
        ?>
    </ul>

    <h2>Serviços Realizados</h2>
    <ul>
        <?php
        $sql = "SELECT sr.*, s.nomeService, s.descService, c.valor, c.descricao, c.data_Contratacao 
                FROM servicos_realizados sr
                INNER JOIN contratacoes c ON sr.id_contratacao = c.id_Contratacao
                INNER JOIN services s ON c.id_Service = s.id_Service 
                WHERE sr.id_Usr = $id_Usr";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $valor = $row['valor'];
                $valor = substr($valor, 0, -2);
                $valor = number_format($valor, 2, ',', '.');
                $data_contratacao = $row['data_Contratacao'];
                $data_contratacao = date('d/m/Y', strtotime($data_contratacao));
                $data_realizacao = $row['data_realizacao'];
                $data_realizacao = date('d/m/Y', strtotime($data_realizacao));
                echo "<li>";
                echo "Serviço: " . $row["nomeService"]. "<br>";
                echo "Descrição: " . $row["descService"]. "<br>";
                echo "Valor: R$ $valor <br>";
                echo "Descrição da Contratação: " . $row["descricao"]. "<br>";
                echo "Data de Contratação: $data_contratacao <br>";
                echo "Data de Realização: $data_realizacao <br>";
                echo "</li>";
            }
        } else {
            echo "<li>Nenhum serviço realizado.</li>";
        }
        $conn->close();
        ?>
    </ul>
</body>
</html>
