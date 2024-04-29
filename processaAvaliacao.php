<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "connect.php";


if (!isset($_SESSION['usrLogado'])) {
    echo "Você precisa estar logado para avaliar.";
    exit;
}

if (isset($_POST['id_Pf']) && isset($_POST['rating'])) {
    $id_Pf = $_POST['id_Pf'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO avaliacoes (id_prof, avaliacao) VALUES ($id_Pf, $rating)";
    $conn->query($sql);

    $sql = "SELECT AVG(avaliacao) AS media FROM avaliacoes WHERE id_prof = $id_Pf";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $media = $row['media'];


    $sql = "UPDATE prof SET avaliacao_media = $media WHERE id_Pf = $id_Pf";
    $conn->query($sql);

    echo "Avaliação enviada com sucesso.";
} else {
    echo "Erro ao processar avaliação.";
}
?>
