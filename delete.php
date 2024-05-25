<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="delete">Digite seu email para apagar de fato</label>
        <input type="text" name="delete">
        <input type="submit" value="enviar">
    </form>
</body>

</html>

<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM users WHERE email='$delete'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}

$conn->close();
?>