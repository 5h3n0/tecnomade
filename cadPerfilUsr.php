<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "connect.php";
require_once 'navUsr.php';
//  if (!isset($_SESSION['usrCadastro'])) {
//      header("Location: lgcd.php");
//  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/perfilUsr.css">
    <title>Perfil do usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <div class="container">
        <div class="dados-usr_cad">
            <?php
            if (isset($_SESSION['id_Usr'])) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                        $temp_name = $_FILES['imagem']['tmp_name'];

                        $nome_imagem = md5(uniqid()) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                        $caminho = "upload/" . $nome_imagem;

                        if (move_uploaded_file($temp_name, $caminho)) {

                            $updateImagem = "UPDATE users SET imgName = '$nome_imagem' WHERE id_Usr = $_SESSION[id_Usr]";
                            $conn->query($updateImagem);
                        } 
                    }

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
                    $_SESSION['usrLogado'] = true;
                    unset($_SESSION['pfCadastro']);
                    if (!empty($row['imgName'])) {
                        $imgPf = "upload/" . $row['imgName'];
                   
                        echo "<img src='$imgUsr' alt='Imagem do Profissional' class='imgUsr imgUsr_cad'><br><br>";
                    }




                    if (empty($row['imgName'])) {
                        echo "<img src='./imgs/user.png' class=' imgUsr imgUsr_cad sem_foto'><br><br>";
                    }
                    echo "<form method='POST' class=form_usr enctype='multipart/form-data'>";
                    echo "<div class='input_file input_file_cad'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-upload' viewBox='0 0 16 16'>
                    <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5'/>
                    <path d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z'/></svg><input type='file' name='imagem' accept='foto/'>";
                    echo "</div>";
                    echo "<div class='cont_usr_edit cont_usr_cad'>";
                    echo "<h3 class='title_perfil title_perfil_edit title_perfil_cad'>Meus Dados</h3><br>";
                    echo "<hr>";
                    echo "<div class='area'>";
                    echo "<label class='lbl_dados'>Nome : </label><br>";
                    echo "<input type='text' class='inp_dados' name='usrName' value='" . $row["usrName"] . "'>";
                    echo "</div>";
                    echo "<div class='area'>";
                    echo "<label class='lbl_dados'>E-mail:</label><br>";
                    echo "<input type='text' class='inp_dados' name='email' value='" . $row["email"] . "'>";
                    echo "</div>";
                    echo "<button type='submit' name='fimCad' onclick='fimCad()' class='btn2 btn2-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-send' viewBox='0 0 16 16'>
                    <path d='M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z'/>
                  </svg> Atualizar</button>";
                    echo "</div>";
                    echo "</form>";
                }

                $conn->close();
            } else {
                echo "ID do usuário não encontrado.";
            }


            if(isset($_POST['fimCad'])){
                echo"<script>window.location.href='perfilUsr.php'</script>";
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

    </script>
</body>

</html>