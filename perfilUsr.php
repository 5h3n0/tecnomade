<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "connect.php";
require_once 'navUsr.php';
unset($_POST['atualizar']);
if(!isset($_SESSION['usrLogado'])){
    header("location: lgcd.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="css/perfilUsr.css">
    <meta charset="UTF-8">
    <title>Perfil do usuário</title>
    lin
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="dados-usr">
            <?php
            if (isset($_SESSION['id_Usr'])) {

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    if (isset($_POST['usrName'], $_POST['email'])) {
                        $nome = $_POST['usrName'];
                        $email = $_POST['email'];
                        

                        $updateCampos = "UPDATE users SET usrName = '$nome', email = '$email' WHERE id_Usr = $_SESSION[id_Usr]";
                        $conn->query($updateCampos);
                    }
                }

                $sql = "SELECT * FROM users WHERE id_Usr = $_SESSION[id_Usr]";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();



                    if (!empty($row['imgName'])) {
                        $imgUsr ="upload/". $row['imgName'];
                        
                        echo "<img src='$imgUsr' alt='Imagem do Profissional' class='imgUsr'><br><br>";
                    } else {
                        echo "Imagem não encontrada.";
                    }

                    echo "<form method='POST' enctype='multipart/form-data' class='form_usr form_perfil'>";
                    echo "<div class='cont_pf'>";
                    echo "<h3 class='title_perfil'>Meus Dados</h3><br>";
                    echo"<div class='area'>";
                        echo "<label class='lbl_dados'>Nome:</label>";
                        echo "<p class='dados'>$row[usrName]</p>";
                    echo "</div>";
                    echo"<div class='area'>";
                        echo "<label class='lbl_dados'>E-mail:</label>";
                        echo "<p class='dados'>$row[email]</p>";

                    echo "</div>";
                    echo '<button class="edit_perfil"><a class="edit" href="editarPerfilUsr.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                  </svg> Editar Perfil</a></button>';
                    echo "</div>";
                    echo "</form>";
                }

            } else {
                echo "ID do usuário não encontrado.";
            }
            ?>
        </div>
    </div>


</body>

</html>