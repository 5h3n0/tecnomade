<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "connect.php";
require_once 'navPf.php';
if (!isset($_SESSION['pfLogado'])) {
    header("location: lgcd.php");
}
unset($_POST['atualizar']);
?>
<!DOCTYPE html>
<html lang="PT-br">

<head>
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <meta charset="UTF-8">
    <title>Perfil do usuário</title>
    <link rel="stylesheet" href="./css/perfilPf.css">
    <link rel="stylesheet" href="./css/default.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
 
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <div class="container">
        <div class="dados-pf">
            <?php
            if (isset($_SESSION['id_Pf'])) {

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                        $temp_name = $_FILES['imagem']['tmp_name'];


                        $imgData = file_get_contents($temp_name);

                        $imgData = mysqli_real_escape_string($conn, $imgData);


                        $updateImagem = "UPDATE prof SET imgData = '$imgData' WHERE id_Pf = $_SESSION[id_Pf]";
                        $conn->query($updateImagem);
                    }

                    if (isset($_POST['pfName'], $_POST['email'], $_POST['carac'])) {
                        $nome = $_POST['pfName'];
                        $email = $_POST['email'];
                        $carac = $_POST['carac'];


                        $updateCampos = "UPDATE prof SET pfName = '$nome', email = '$email', carac = '$carac' WHERE id_Pf = $_SESSION[id_Pf]";
                        $conn->query($updateCampos);
                    }
                }

                $sql = "SELECT * FROM prof WHERE id_Pf = $_SESSION[id_Pf]";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (!empty($row['imgName'])) {
                        $imgPf = "upload/".$row['imgName'];
                        echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
                    } 
                    if (empty($row['imgName'])) {
                        echo "<img src='./imgs/user.png' alt='Imagem do Profissional' class='imgPf sem_foto'><br><br>";
                    } 
                    echo "<form method='POST' enctype='multipart/form-data'>";
                    echo "<div class='cont_pf'>";
                    echo "<h3 class='title_perfil'>Meus Dados</h3><br>";
                    echo"<hr>";
                    echo"<div class='area'>";
                    echo "<label class='lbl_dados'>Nome : </label>";
                    echo "<p class='dados'>$row[pfName]</p>";
                    echo "</div>";
                    echo"<div class='area'>";
                    echo "<label class='lbl_dados'>E-mail :</label>";
                    echo "<p class='dados'>$row[email]</p>";
                    echo "</div>";
                    
                    echo"<div class='area'>";
                    echo "<label class='lbl_dados'>Especialidade :</label><br>";
                    echo "</div>";

                    echo '<ul>';
                    $sql_especialidades = "SELECT c.nome AS nome_categoria FROM Cat_Sel cs JOIN categorias c ON cs.id_Cat = c.id_Cat WHERE cs.id_Pf = $_SESSION[id_Pf]";
                    $result_especialidades = $conn->query($sql_especialidades);

                    if ($result_especialidades->num_rows > 0) {
                        while ($row_especialidade = $result_especialidades->fetch_assoc()) {
                            echo "<li class='dados' style='margin-left: 5px;'>" . $row_especialidade['nome_categoria'] . "</li>";
                        }
                    } else {
                        echo "<li class='dados' style='color:red;'>Nenhuma especialidade encontrada.</li>";
                    }
                    echo '</ul>';
                    if ($row['descPf'] != '') {
                        echo "<label class='lbl_dados'>Descrição :</label><br>";
                        echo"<div class='cont_descPf'>";
                        echo "<p class='descPf'>  $row[descPf] </p>";
                        echo"</div>";
                    }
                    if (!$row['descPf'] != '') {
                        echo "<label class='lbl_dados'>Descrição :</label><br>";
                        echo"<div class='cont_descPf'>";
                        echo "<span class='span_sem_desc'> Insira uma breve descrição sobre você.</span>";
                        echo "<p class='descPf sem_desc'>  $row[descPf] </p>";
                        echo"</div>";
                    }
                    echo '<button"><a class="edit" href="editarPerfilPf.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                  </svg> Editar Perfil</a></button>';
                    echo "</div>";
                    echo "</form>";
                }

                $conn->close();
            } else {
                echo "ID do usuário não encontrado.";
            }
            ?>
        </div>
    </div>


</body>

</html>