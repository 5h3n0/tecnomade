<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./css/servicesInsert.css">
</head>
<style>
    * {
        font-size: 50px;
    }

    .servico {
        background: gray;
        margin: 5px;
    }
</style>

<body>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "connect.php";

    $id_Pf = $_SESSION['id_Pf'];

    // Consulta para obter os serviços realizados associados ao id_Pf
    $sql = "SELECT sr.*, c.valor, s.nomeService, s.descService, c.data_Contratacao, u.usrName AS nome_usuario
            FROM servicos_realizados sr
            INNER JOIN contratacoes c ON sr.id_contratacao = c.id_contratacao
            INNER JOIN services s ON c.id_Service = s.id_Service
            INNER JOIN users u ON c.id_Usr = u.id_Usr
            WHERE sr.id_Pf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há serviços associados ao id_Pf
    if ($result->num_rows > 0) {
        // Exibe os serviços
        while ($row = $result->fetch_assoc()) {
            echo "<div class='servico'>";
            $valor = isset($row['valor']) ? $row['valor'] : 'Valor não disponível';
            $valor = substr($valor, 0, -2);
            $valor = number_format($valor, 2, ',', '.');
            echo "Nome do Serviço: " . $row['nomeService'] . "<br>";
            echo "Descrição do Serviço: " . $row['descService'] . "<br>";
            echo "Data de Contratação: " . $row['data_Contratacao'] . "<br>";
            echo "Data de Realização: " . $row['data_realizacao'] . "<br>";
            echo "Cliente que Contratou: " . $row['nome_usuario'] . "<br>";
            echo "Valor: R$ $valor <br><br>";
            echo "</div>";
        }
    } else {
        echo "Nenhum serviço encontrado para este usuário.";
    }
    ?>
</body>

</html>