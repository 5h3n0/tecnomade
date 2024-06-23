<?php
include 'navPf.php';
include 'connect.php';
if (!isset($_SESSION)) {
    session_start();
}
$id_Pf = $_SESSION['id_Pf'];
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pfPass = $_POST['pfPass'];
    $hashPass = sha1($pfPass);
    $newPass = $_POST['newPass'];
    $newHashPass = sha1($newPass);
    $rpNewPass = $_POST['rpNewPass'];
    $newHashRpPass = sha1($rpNewPass);
    $msg = ["Preencha todos os campos."];
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
                    $_SESSION['senhaAlterada'] = true;
                // $redirecionar = header("Location: homePf.php");
                    echo "<script>
                
                setTimeout(redirecHome, 3000);
                    function redirecHome(){ 
                     window.location.href = 'homePf.php';
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
            <input type="password" name="pfPass" placeholder="Senha Atual">
            <label for="">Digite sua nova senha:</label>
            <input type="password" name="newPass" placeholder="Nova senha">
            <label for="">Repita a senha:</label>
            <input type="password" name="rpNewPass" placeholder="Confirmar senha">

            <input type="submit" value="Redefinir" class="btn_rdf_pass">
            <?php
            if (isset($_SESSION['senhaAlterada']) && $_SESSION['senhaAlterada']) {
                echo '<p style="color:#00917e; text-align:center; margin: 10px 0;">Senha alterada com sucesso!</p>';
                $_SESSION['senhaAlterada'] = false;
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