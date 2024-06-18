<?php
// Start session if not already started
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['pfLogado'])) {
    header('Location: lgcd.php'); // Redirect to login page if not logged in
    exit();
}

// Include database connection file
require_once "connect.php";

// Handle form submission for inserting new bank data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_insert'])) {
    $id_Pf = $_SESSION['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    // Validate inputs
    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        // Prepare SQL statement for insertion
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
    header("Location: dados_bank.php"); // Redirect to bank data page
    exit();
}

// Handle form submission for updating existing bank data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update'])) {
    $id_Pf = $_POST['id_Pf'];
    $banco = $_POST['updateNameBanco'];
    $conta = $_POST['updateNconta'];
    $agencia = $_POST['updateAgencia'];

    // Validate inputs
    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        // Prepare SQL statement for update
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
    header("Location: dados_bank.php"); // Redirect to bank data page
    exit();
}

// Retrieve and display existing bank data or display insert form if no data exists
$id_Pf = $_SESSION['id_Pf'];
$sql_select = "SELECT banco, conta, agencia FROM dados_bancarios WHERE id_Pf = ?";
if ($stmt = $conn->prepare($sql_select)) {
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display existing data and option to update
        $row = $result->fetch_assoc();
        $banco = htmlspecialchars($row['banco']);
        $conta = htmlspecialchars($row['conta']);
        $agencia = htmlspecialchars($row['agencia']);

        echo "<div class='box_dadosBank'>";
        echo "Banco: " . $banco . "<br>";
        echo "Conta: " . $conta . "<br>";
        echo "Agência: " . $agencia . "<br>";
        echo "<button onclick='divUpdate()'>Atualizar dados</button>";
        echo "</div>";
    } else {
        // Display form to insert new data
        echo "<form action='dados_bank.php' method='post'>
                <input type='hidden' name='id_Pf' value='" . $id_Pf . "'>
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
                    <input type='submit' name='submit_insert' value='Salvar'>
                </div>
            </form>";
    }
    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}
?>

<?php
// Display success or error message if set
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
?>

<form action="dados_bank.php" class="divUpdate" method="post" style="display:none">
    <input type='hidden' name='id_Pf' value="<?php echo $id_Pf; ?>">
    <div class='boxAddDadosBank'>
        <label for='updateNameBanco'>Banco:</label>
        <select name='updateNameBanco' id='updateNameBanco' required>
            <option value='Banco do Brasil' <?php if ($banco == 'Banco do Brasil') echo 'selected'; ?>>Banco do Brasil</option>
            <option value='Caixa Econômica' <?php if ($banco == 'Caixa Econômica') echo 'selected'; ?>>Caixa Econômica</option>
            <option value='Bradesco' <?php if ($banco == 'Bradesco') echo 'selected'; ?>>Bradesco</option>
            <option value='Itaú' <?php if ($banco == 'Itaú') echo 'selected'; ?>>Itaú</option>
        </select>
        <br>
        <label for='updateNconta'>Conta: </label>
        <input type='text' id='updateNconta' name='updateNconta' maxlength='10' value="<?php echo $conta; ?>" required>
        <br>
        <label for='updateAgencia'>Agência: </label>
        <input type='text' id='updateAgencia' name='updateAgencia' maxlength='10' value="<?php echo $agencia; ?>" required>
        <br>
        <input type='submit' name='submit_update' value='Alterar'>
    </div>
</form>

<script>
    function divUpdate() {
        document.querySelector('.divUpdate').style.display = 'block';
        document.querySelector('.box_dadosBank').style.display = 'none';
    }
</script>
