<?php
if (!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['pfLogado'])){
    header('Location: lgcd.php');
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
    <form action="" method="post" >
    <input type="hidden" name="id_Pf" value="<?php echo $_SESSION['id_Pf']; ?>">


        <label for="nameBanco">Banco:</label>
        <select name="nameBanco" id="nameBanco" >
            <option value="Banco do Brasil">Banco do Brasil</option>
            <option value="Caixa Econômica">Caixa Econômica</option>
            <option value="Bradesco">Bradesco</option>
            <option value="Itaú">Itaú</option>
        </select>
        <br>
        <label for="Nconta">Conta: </label>
        <input type="text" id="Nconta" name="Nconta" required>
        <br>
        <label for="Agencia">Agência: </label>
        <input type="text" id="Agencia" name="Agencia" required>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_Pf = $_POST['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    if (empty($id_Pf) && empty($banco) && empty($conta) && empty($agencia)) {
        $sql = "INSERT INTO dados_bancarios (id_Pf, banco, conta, agencia) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isss", $id_Pf, $banco, $conta, $agencia);

            if ($stmt->execute()) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da query: " . $conn->error;
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}

$conn->close();
?>

