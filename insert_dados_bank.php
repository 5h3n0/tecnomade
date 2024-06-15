<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_Pf = $_SESSION['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        $sql_insert = "INSERT INTO dados_bancarios (id_Pf, banco, conta, agencia) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql_insert)) {
            $stmt->bind_param("isss", $id_Pf, $banco, $conta, $agencia);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Dados inseridos com sucesso!";
            } else {
                $_SESSION['message'] = "Erro ao inserir os dados: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Erro na preparação da query: " . $conn->error;
        }
    }
    header("Location: dados_bank.php");
    exit();
}
?>

<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}

$id_Pf = $_SESSION['id_Pf'];
$sql_test = "SELECT banco, conta, agencia FROM dados_bancarios WHERE id_Pf = ?";
if ($stmt = $conn->prepare($sql_test)) {
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result_test = $stmt->get_result();

    if ($result_test->num_rows > 0) {
        // Se já existem dados, exibir as informações
        $row_test = $result_test->fetch_assoc();
        echo "<div class='box_dadosBank' style='display:block;'>";
        echo "Banco: " . htmlspecialchars($row_test['banco']) . "<br>";
        echo "Conta: " . htmlspecialchars($row_test['conta']) . "<br>";
        echo "Agência: " . htmlspecialchars($row_test['agencia']) . "<br>";
        echo "</div>";
    } else {
        // Se não existem dados, exibir o formulário
        echo "<form action='insert_dados_bank.php' method='post'>
                <input type='hidden' name='id_Pf' value='" . htmlspecialchars($id_Pf) . "'>
                <div class='boxAddDadosBank'>
                    <label for='nameBanco'>Banco:</label>
                    <select name='nameBanco' id='nameBanco' required>
                        <option value='Banco do Brasil'>Banco do Brasil</option>
                        <option value='Caixa Econômica'>Caixa Econômica</option>
                        <option value='Bradesco'>Bradesco</option>
                        <option value='Itaú'>Itaú</option>
                    </select>
                    <br>
                    <label for='Nconta'>Conta: </label>
                    <input type='text' id='Nconta' name='Nconta' maxlength='10' required>
                    <br>
                    <label for='Agencia'>Agência: </label>
                    <input type='text' id='Agencia' name='Agencia' maxlength='10' required>
                    <br>
                    <input type='submit' value='Salvar'>
                </div>
            </form>";
    }
    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}
?>
