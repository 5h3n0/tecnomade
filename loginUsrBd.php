<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
include_once('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['enviarForm']))) {
    $email = mysqli_escape_string($conn, $_POST['email']);
    $usrPass = mysqli_escape_string($conn, $_POST['usrPass']);
    $sql = "SELECT id_Usr, usrName, hashPass FROM users WHERE email ='$email'";
    $result = $conn->query($sql);
    if (empty($email) || empty($usrPass)) {
        echo "<script>alert('*Preencha todos os campos!!*')</script>";
        echo '<script>window.location.href = "lgcd.php";</script>';
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passBd = $row['hashPass'];
            $createHashVf = sha1($usrPass);
            if ($passBd === $createHashVf) {
                $_SESSION['usrLogado'] = true;
                $_SESSION['id_Usr'] =  $row['id_Usr'];
                $_SESSION['usrName'] = $row['usrName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['celUsr'] = $row['celUsr'];
                $_SESSION['dtNasUsr'] = $row['dtNasUsr'];
                header('location: homeUsr.php');
            } else {
                header("Location: lgcd.php");
                $_SESSION['repita'] = true;
            }
        } else {
            header("Location: lgcd.php");
            $_SESSION['repita'] = true;
        }
    }
}
?>