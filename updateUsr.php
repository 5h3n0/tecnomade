<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Digite sua senha atual:
        <br>
        <input type="text" name="usrPass">
        <br>
        Digite sua nova senha:
        <br>
        <input type="text" name="newPass">
        <br>
        Repita a senha:
        <br>
        <input type="text" name="rpNewPass">
        <br>
        <input type="submit" value="enviar">

    </form>

</body>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connect.php';
$id_Usr = $_SESSION['id_Usr'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usrPass = $_POST['usrPass'];
    $hashPass = sha1($usrPass);
    $newPass = $_POST['newPass'];
    $newHashPass = sha1($newPass);
    $rpNewPass = $_POST['rpNewPass'];
    $newHashRpPass = sha1($rpNewPass);
    $msg = ["Preencha todos os campos.", "Senha alterada com sucesso!", "Erro ao tentar alterar a senha.", "Senha inválida", "Erro ao verificar a senha."];
    $_SESSION['msg'] = $msg;
    if (empty($usrPass) || empty($newPass) || empty($rpNewPass)) {
       echo $_SESSION['msg'][0];
       unset($_SESSION['msg']);
    } else {
        $vfPassQuery = "SELECT hashPass FROM users WHERE id_Usr ='$id_Usr'";
        $vfPassResult = mysqli_query($conn, $vfPassQuery);

        if ($vfPassResult) {
            $row = mysqli_fetch_assoc($vfPassResult);
            if ($row['hashPass'] === $hashPass) {
                $sql = "UPDATE users SET hashPass='$newHashPass' WHERE id_Usr ='$id_Usr'";
                if (mysqli_query($conn, $sql)) {
                   echo $_SESSION['msg'][1];
                   unset($_SESSION['msg']);
                } else {
                    echo  $_SESSION['msg'][2];
                   unset($_SESSION['msg']);

                }
            } else {
                echo $_SESSION['msg'][3];
               unset($_SESSION['msg']);

            }
        } else {
            echo  $_SESSION['msg'][4];
           unset($_SESSION['msg']);

        }
    }
}

$conn->close();
?>


</html>