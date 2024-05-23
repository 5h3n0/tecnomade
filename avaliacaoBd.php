<?php
include_once('connect.php');
echo"
<a href='avaliar.php'>avaliar</a>
<a href='media.php'> media</a>
<br>
<br>
";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_Pf = $_POST['id_Pf'];
    $estrelas = $_POST['estrelas'];
    $data_avaliacao = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO avaliacoes(id_Pf, estrelas, data_avaliacao) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $id_Pf, $estrelas, $data_avaliacao);
    
    if ($stmt->execute()) {
       header("Location: paginaDeServicosParaUsr.php");
    } else {
        echo "Erro ao registrar avaliação: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>