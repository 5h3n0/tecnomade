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
    $pfPass = mysqli_escape_string($conn, $_POST['pfPass']);
    $sql = "SELECT id_Pf, pfName, hashPass FROM prof WHERE email ='$email'";
    $result = $conn->query($sql);

    if (empty($email) || empty($pfPass)) {
        echo "<script>alert('*Preencha todos os campos!!*')</script>";
        echo '<script>window.location.href = "lgcd.php";</script>';
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passBd = $row['hashPass'];
            $createHashVf = sha1($pfPass);

            if ($passBd === $createHashVf) {
                $_SESSION['pfLogado'] = true;
                $_SESSION['id_Pf'] =  $row['id_Pf'];
                $_SESSION['pfName'] = $row['pfName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['celPf'] = $row['celPf'];
                $_SESSION['dtNasPf'] = $row['dtNasPf'];
                header("location: homePf.php");
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