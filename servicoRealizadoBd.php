<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $id_contratacao = mysqli_real_escape_string($conn, $_POST['id_contratacao']);
    $id_Pf = mysqli_real_escape_string($conn, $_POST['id_Pf']);
    $id_Usr = mysqli_real_escape_string($conn, $_POST['id_Usr']);
    $id_Service = mysqli_real_escape_string($conn, $_POST['id_Service']);
    $data_realizacao = date("Y-m-d");

    // Inserindo os dados na tabela de serviços realizados
    $sql = "INSERT INTO servicos_realizados (id_contratacao, id_Pf, id_Usr, id_Service, data_realizacao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $id_contratacao, $id_Pf, $id_Usr, $id_Service, $data_realizacao);

    if ($stmt->execute()) {
        header("Location: homePf.php");
    } else {
        echo "Erro ao inserir os dados: " . $stmt->error;
    }
} else {
    echo "O formulário não foi submetido corretamente.";
}
?>
