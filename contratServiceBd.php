<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_service = mysqli_real_escape_string($conn, $_POST['id_Service']);
    $id_Pf = mysqli_real_escape_string($conn, $_POST['id_Pf']);
    $id_Usr = $_SESSION['id_Usr'];
    $vlrService = mysqli_real_escape_string($conn, $_POST['vlrService']);
    $descService = mysqli_real_escape_string($conn, $_POST['descService']);
    $data_Contratacao = date("Y-m-d");

    $sql = "INSERT INTO contratacoes (id_Service, id_Pf, id_Usr, valor, descricao, data_Contratacao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiidss", $id_service, $id_Pf, $id_Usr, $vlrService, $descService, $data_Contratacao);

    if ($stmt->execute()) {
        header("Location:cartao.php");
    } else {
        echo "Erro ao inserir os dados: " . $stmt->error;
    }
} else {
    echo "O formulário não foi submetido corretamente.";
}
?>