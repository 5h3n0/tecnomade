<?php
include 'navPf.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .cont{
            height: 80%;
            display: flex;
            margin: auto;
            justify-content: center;
            margin-top: 5%;
            width:100%;
        }
        form{
            width: 60%;
            height: 20%;
            justify-content: center;
            
            margin: auto;

        }
        input[type=text]{
            width: 50%;
            display: block;
        }
        label{
            display: block;
        }
    </style>
</head>

<body>
    <section class="cont">
        <form action="" method="post">
            Digite sua senha atual:
        <br>
        <input type="text" name="pfPass">
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
    </section>

</body>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$id_Pf = $_SESSION['id_Pf'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pfPass = $_POST['pfPass'];
    $hashPass = sha1($pfPass);
    $newPass = $_POST['newPass'];
    $newHashPass = sha1($newPass);
    $rpNewPass = $_POST['rpNewPass'];
    $newHashRpPass = sha1($rpNewPass);
    $msg = ["Preencha todos os campos.", "Senha alterada com sucesso!", "Erro ao tentar alterar a senha.", "Senha inválida", "Erro ao verificar a senha."];
    $_SESSION['msg'] = $msg;
    if (empty($pfPass) || empty($newPass) || empty($rpNewPass)) {
        echo $_SESSION['msg'][0];
        unset($_SESSION['msg']);
    } else {
        $vfPassQuery = "SELECT hashPass FROM prof WHERE id_Pf ='$id_Pf'";
        $vfPassResult = mysqli_query($conn, $vfPassQuery);

        if ($vfPassResult) {
            $row = mysqli_fetch_assoc($vfPassResult);
            if ($row['hashPass'] === $hashPass) {
                $sql = "UPDATE prof SET hashPass='$newHashPass' WHERE id_Pf ='$id_Pf'";
                if (mysqli_query($conn, $sql)) {
                    echo $_SESSION['msg'][1];
                    unset($_SESSION['msg']);
                } else {
                    echo $_SESSION['msg'][2];
                    unset($_SESSION['msg']);

                }
            } else {
                echo $_SESSION['msg'][3];
                unset($_SESSION['msg']);

            }
        } else {
            echo $_SESSION['msg'][4];
            unset($_SESSION['msg']);

        }
    }
}

$conn->close();
?>


</html>
<?php
include 'footer.php';
?>