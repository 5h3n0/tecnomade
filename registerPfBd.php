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
    $pfName = $_POST['pfName'];
    $gender = $_POST['gender'];
    $dtNasPf = $_POST['dtNasPf'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $celPf = $_POST['celPf'];
    $cnpj = $_POST['cnpj'];
    $pfPass = $_POST['pfPass'];
    $pfRpPass = $_POST['pfRpPass'];
    $hashPass = sha1($pfPass);
    $id_Pf = null;
    if (empty($pfName) || empty($email) || empty($dtNasPf) || empty($gender) || empty($celPf) || empty($cnpj) || empty($pfPass) || empty($pfRpPass)) {
        header("Location: lgcd.php?deuruim");
        exit;
    } elseif ($pfPass != $pfRpPass) {
        echo "<script>alert('*As senhas não conferem*')</script>";
        header("Location: lgcd.php?error=campos_vazios");
    } else {
        $verifyIfExists = "SELECT * FROM prof WHERE email = '$email'";
        $resultVerify = $conn->query($verifyIfExists);
        if ($resultVerify === false) {
        } else {
            if ($resultVerify->num_rows > 0) {
                echo "<script>alert('Impossível cadastrar, email já está em uso')</script>";
            } else {
                $sql_pf = "INSERT INTO prof(pfName, dtNasPf, email, gender, celPf, cnpj, hashPass) VALUES ('$pfName','$dtNasPf', '$email', '$gender', '$celPf','$cnpj','$hashPass')";

                if ($conn->query($sql_pf) === TRUE) {

                    $result = $conn->query("SELECT LAST_INSERT_ID() as id_Pf");

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id_Pf = $row["id_Pf"];
                        $_SESSION['pfCadastro'] = true;
                        $_SESSION['id_Pf'] = $id_Pf;
                        $_SESSION['pfName'] = $row['pfName'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['celPf'] = $row['celPf'];
                        $_SESSION['dtNasPf'] = $row['dtNasPf'];

                        echo "Cadastro de usuário realizado com sucesso!<br>";

                        header("Location: endPf.php?id_Pf=$id_Pf");
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
