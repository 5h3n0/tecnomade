<?php
header('Content-Type: text/html; charset=utf-8');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "connect.php";


    $nome = $_POST["nome"];
    $descricao = $_POST["desc"];
    $preco = $_POST["preco"];
  


    // Remove o símbolo de moeda e quaisquer separadores de milhar
    $preco = preg_replace('/[^0-9]/', '', $preco);
    


    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO services (nomeService, descService, vlrService, id_Cat, id_Pf) VALUES (?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);

    if ($stmt) {      
        $stmt->bind_param("ssdii", $nome, $descricao, $preco, $categoria, $id_Pf);

        $id_Pf = $_SESSION['id_Pf']; 

 
        if ($stmt->execute()) {
            $_SESSION['servicoInserido'] = true;
            header('location: paginaDeServicosParaPrestador.php');
            exit(); 
        } else {
            echo "Erro ao inserir o serviço: " . $stmt->error;
        }

    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }


    $conn->close();
}


?>
