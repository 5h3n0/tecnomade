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

    $sql = "INSERT INTO contratacoes (id_Service, id_Pf, id_Usr, valor, descricao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiids", $id_service, $id_Pf, $id_Usr, $vlrService, $descService);
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir os dados: " . $stmt->error;
    }
} else {
    echo "O formulário não foi submetido corretamente.";
}
?>