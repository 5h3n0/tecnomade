<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['enviarForm']))) {
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $num = $_POST['num'];
    $comp = $_POST['comp'];


    try {
        $result = $conn->query("SELECT * FROM users ORDER BY id_Usr DESC LIMIT 1;");

        if ($result && $result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $id_Usr = $row['id_Usr'];

            $sql = "INSERT INTO enderecos (id_Usr, cep, rua, bairro, cidade, uf, num, comp) VALUES ('$id_Usr', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$num', '$comp')";
            $conn->query($sql);

            $conn->commit();
            header("Location: cadPerfilUsr.php");
        } else {
            $conn->rollback();
            echo "Erro: Usuário não encontrado ou outra condição de seleção não atendida.";
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Erro ao inserir o registro: " . $e->getMessage();
    }

    echo "<script>alert('Tentando inserir endereço. SQL: $sql')</script>";

    $conn->close();
}