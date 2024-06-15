<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_Pf = $_POST['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        $sql_update = "UPDATE dados_bancarios SET banco = ?, conta = ?, agencia = ? WHERE id_Pf = ?";
        if ($stmt = $conn->prepare($sql_update)) {
            $stmt->bind_param("sssi", $banco, $conta, $agencia, $id_Pf);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Dados alterados com sucesso!";
            } else {
                $_SESSION['message'] = "Erro ao atualizar os dados: " . $stmt->error;
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
$banco = $conta = $agencia = '';
$sql_test = "SELECT banco, conta, agencia FROM dados_bancarios WHERE id_Pf = ?";
if ($stmt = $conn->prepare($sql_test)) {
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result_test = $stmt->get_result();

    if ($result_test->num_rows > 0) {
        $row_test = $result_test->fetch_assoc();
        $banco = htmlspecialchars($row_test['banco']);
        $conta = htmlspecialchars($row_test['conta']);
        $agencia = htmlspecialchars($row_test['agencia']);
    }
    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}
?>

<form action="update_dados_bank.php" method="post">
    <input type='hidden' name='id_Pf' value="<?php echo htmlspecialchars($id_Pf); ?>">
    <div class='boxAddDadosBank'>
        <label for='nameBanco'>Banco:</label>
        <select name='nameBanco' id='nameBanco' required>
            <option value='Banco do Brasil' <?php echo ($banco == 'Banco do Brasil') ? 'selected' : ''; ?>>Banco do Brasil</option>
            <option value='Caixa Econômica' <?php echo ($banco == 'Caixa Econômica') ? 'selected' : ''; ?>>Caixa Econômica</option>
            <option value='Bradesco' <?php echo ($banco == 'Bradesco') ? 'selected' : ''; ?>>Bradesco</option>
            <option value='Itaú' <?php echo ($banco == 'Itaú') ? 'selected' : ''; ?>>Itaú</option>
        </select>
        <br>
        <label for='Nconta'>Conta: </label>
        <input type='text' id='Nconta' name='Nconta' maxlength='10' value="<?php echo $conta; ?>" required>
        <br>
        <label for='Agencia'>Agência: </label>
        <input type='text' id='Agencia' name='Agencia' maxlength='10' value="<?php echo $agencia; ?>" required>
        <br>
        <input type='submit' value='Alterar'>
    </div>
</form>
