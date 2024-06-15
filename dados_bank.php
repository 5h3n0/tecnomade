<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['pfLogado'])) {
    header('Location: lgcd.php');
    exit();
}

require_once "connect.php";
echo $_SESSION['id_Pf'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>

<body>
    <form action="dados_bank.php" method="post">
        <input type="hidden" name="id_Pf" value="<?php echo $_SESSION['id_Pf']; ?>">
        <div class="boxAddDadosBank">
            <label for="nameBanco">Banco:</label>
            <select name="nameBanco" id="nameBanco" required>
                <option value="Banco do Brasil">Banco do Brasil</option>
                <option value="Caixa Econômica">Caixa Econômica</option>
                <option value="Bradesco">Bradesco</option>
                <option value="Itaú">Itaú</option>
            </select>
            <br>
            <label for="Nconta">Conta: </label>
            <input type="text" id="Nconta" name="Nconta" maxlength="10" required>
            <br>
            <label for="Agencia">Agência: </label>
            <input type="text" id="Agencia" name="Agencia" maxlength="" required>
            <br>
            <input type="submit" value="Salvar" id="ActiveFunction">
        </div>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_Pf = $_POST['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    if (empty($id_Pf) || empty($banco) || empty($conta) || empty($agencia)) {
        echo "Todos os campos são obrigatórios!";
    } else {
        $sql_consulta = "SELECT * FROM dados_bancarios WHERE id_Pf = ?";
        if ($stmt = $conn->prepare($sql_consulta)) {
            $stmt->bind_param("i", $_SESSION['id_Pf']);
            $stmt->execute();
            $result_consulta = $stmt->get_result();

            if ($result_consulta->num_rows > 0) {
                $sql_update = "UPDATE dados_bancarios SET banco = ?, conta = ?, agencia = ? WHERE id_Pf = ?";
                if ($stmt = $conn->prepare($sql_update)) {
                    $stmt->bind_param("sssi", $banco, $conta, $agencia, $id_Pf);
                    if ($stmt->execute()) {
                        echo "Dados alterados com sucesso!";
                        echo "<script>
                        joca();
                        </script>";
                        exit();
                    }

                }
            } else {
                $sql = "INSERT INTO dados_bancarios (id_Pf, banco, conta, agencia) VALUES (?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("isss", $id_Pf, $banco, $conta, $agencia);

                    if ($stmt->execute()) {
                        echo "
                            <script>
                               ActiveFunction();
                            </script>
                            ";
                        echo "Dados inseridos com sucesso!";
                        exit();
                    } else {
                        echo "Erro: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Erro na preparação da query: " . $conn->error;
                }
            }
        }



    }
}

$sql_test = "SELECT * FROM dados_bancarios WHERE id_Pf = ? ";
if ($stmt = $conn->prepare($sql_test)) {
    $id_Pf = $_SESSION['id_Pf'];
    $stmt->bind_param("isss", $id_Pf, $banco, $conta, $agencia);

    $stmt->execute();
    $result_test = $stmt->get_result();

    if ($result_test->num_rows > 0) {
        if ($row_test = $result->fetch_assoc()) {
            echo "<div class='box_dadosBank' style='display:block;'>";
            echo "Banco: " . $row_test['banco'] . "<br>";
            echo "Conta: " . $row_test['conta'] . "<br>";
            echo "Agência: " . $row_test['agencia'] . "<br>";
            echo "
            <label for='nameBanco'>Banco:</label>
            <input type='text' id='nameBanco' name='nameBanco' value=" . $row_test['banco'] . " disabled>
            <br>
            <label for='Nconta'>Conta: </label>
            <input type='text' id='nuMconta' value=" . $row_test['conta'] . " disabled>
            <br>
            <label for='Agencia'>Agência: </label>
            <input type='text' id='numBgencia' value=" . $row_test['agencia'] . " disabled>
            ";
            echo "</div>";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }

    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}

$conn->close();
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        function joca() {
            const box_registro = document.querySelector('.boxAddDadosBank');
            const box_dados = document.querySelector('.box_dadosBank');

            box_registro.style.display = 'none';
            box_dados.style.display = 'block';
        }
    });

</script>