<?php
include 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'navUsr.php';
$id_Usr = $_SESSION['id_Usr'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usrPass = $_POST['usrPass'];
    $hashPass = sha1($usrPass);
    $newPass = $_POST['newPass'];
    $newHashPass = sha1($newPass);
    $rpNewPass = $_POST['rpNewPass'];
    $newHashRpPass = sha1($rpNewPass);
    $msg = ["Preencha todos os campos."];
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
                   $_SESSION['senhaAlteradaUsr'] = true;
                } 
            } 
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" style="margin-top:300px;">
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
        <?php
        if (isset($_SESSION['senhaAlteradaUsr']) && $_SESSION['senhaAlteradaUsr']) {
            echo '  <p style="color:#00917e;">Senha alterada com sucesso!</p>';
            $_SESSION['senhaAlteradaUsr'] = false;
        }
        ?>
    </form>

</body>



</html>