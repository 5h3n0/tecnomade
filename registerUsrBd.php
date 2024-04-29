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
    $usrName = $_POST['usrName'];
    $gender = $_POST['gender'];
    $dtNasUsr = $_POST['dtNasUsr'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $celUsr = $_POST['celUsr'];
    $cpf = $_POST['cpf'];
    $usrPass = $_POST['usrPass'];
    $usrRpPass = $_POST['usrRpPass'];
    $hashPass = sha1($usrPass);
    $id_Usr = null;
    if (empty($usrName) || empty($email) || empty($dtNasUsr)|| empty($gender) || empty($celUsr) || empty($cpf) || empty($usrPass) || empty($usrRpPass)) {
        header("Location: lgcd.php");
        exit;
    }elseif ($usrPass != $usrRpPass) {
        header("Location: lgcd.php");
    } else {
        $verifyIfExists = "SELECT * FROM users WHERE email = '$email'";
        $resultVerify = $conn->query($verifyIfExists);
        if ($resultVerify === false) {
        } else {
            if ($resultVerify->num_rows > 0) {
                echo "<script>alert('Impossível cadastrar, email já está em uso')</script>";
            } else {
                $sql = "INSERT INTO users(usrName, dtNasUsr, email, gender,  celUsr, cpf, hashPass) VALUES ('$usrName',
                '$dtNasUsr', '$email', '$gender', '$celUsr', '$cpf', '$hashPass')";

                if ($conn->query($sql) === TRUE) {

                    $result = $conn->query("SELECT LAST_INSERT_ID() as id_Usr");

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id_Usr = $row["id_Usr"];
                        $_SESSION['usrCadastro'] = true;
                        $_SESSION['id_Usr'] =  $id_Usr;
                        $_SESSION['usrName'] = $row['usrName'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['celUsr'] = $row['celUsr'];
                        $_SESSION['dtNasUsr'] = $row['dtNasUsr'];

                        echo "Cadastro de usuário realizado com sucesso!<br>";

                        header("Location: endUsr.php?id_Usr=$id_Usr");
                        exit();

                    } else {
                        echo "Erro ao obter o ID do usuário recém-cadastrado.";
                    }
                } else {
                    echo "Erro no cadastro de usuário: " . $conn->error;
                }

                $conn->close();
            }
        }
    }
}