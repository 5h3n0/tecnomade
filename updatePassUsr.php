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
                   echo "<script>
                
                setTimeout(redirecHome, 3000);
                    function redirecHome(){ 
                     window.location.href = 'homeUsr.php';
                    };
        
                </script>";

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
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/style_redefinirPass.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Redefinir senha</title>
    <style>

    </style>
</head>

<body>

<section class="cont">

    <form action="" method="post">
    <img src="./imgs/chave-inteligente.png" class="key_redefinir_img">
            <h2>Redefinir senha</h2>
            <p>Para criar uma senha forte, sua nova senha deve conter pelo menos 8 caracteres, incluindo uma combinação
                de letras maiúsculas e minúsculas, números e caracteres especiais como @, # ou $.</p>
            <label>Digite sua senha atual:</label>
        <input type="password" name="usrPass">
        <label for="">Digite sua nova senha:</label>
        <input type="password" name="newPass">
        <label for="">Repita a senha:</label>
        <input type="password" name="rpNewPass">
        <input type="submit" value="Redefinir" class="btn_rdf_pass">
        <?php
        if (isset($_SESSION['senhaAlteradaUsr']) && $_SESSION['senhaAlteradaUsr']) {
            echo '  <p style="color:#00917e; text-align:center; margin: 10px 0;">Senha alterada com sucesso!</p>';
            $_SESSION['senhaAlteradaUsr'] = false;
        }
        ?>
    </form>


    <div class="comentario_alert">
        <p> Evite utilizar palavras comuns, sequências de números ou informações pessoais facilmente descobertas. Por favor, insira sua nova senha nos campos abaixo para continuar.</p>
    </div>

    </section>

    <canvas id="c"></canvas>
 
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector("#loginOpen").style.display = 'none';
        });

    </script>

</body>

</html>
<?php
include_once "animacao.php";
include 'footer.php';
?>