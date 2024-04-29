<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "connect.php";
require_once 'navPf.php';
if (!isset($_SESSION['pfLogado'])) {
    header("Location: lgcd.php");
}
unset($_SESSION['escolhendoCat']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perfil do usuário</title>
    <link rel="stylesheet" href="./css/perfilPf.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .containerDivInsert{
            position: absolute;
            left: 38% !important;
            top: 10%;
        }
    </style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="dados-pf dados-pf_edit">
            <?php
            if (isset($_SESSION['id_Pf'])) {

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                        $temp_name = $_FILES['imagem']['tmp_name'];

    
                        $nome_imagem = md5(uniqid()) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                        $caminho = "upload/" . $nome_imagem;

                        if (move_uploaded_file($temp_name, $caminho)) {

                            $updateImagem = "UPDATE prof SET imgName = '$nome_imagem' WHERE id_Pf = $_SESSION[id_Pf]";
                            $conn->query($updateImagem);
                        } 
                    }

                    if (isset($_POST['pfName'], $_POST['email'], $_POST['descPf'])) {
                        $nome = $_POST['pfName'];
                        $email = $_POST['email'];
                        $descPf = $_POST['descPf'];

                        $updateCampos = "UPDATE prof SET pfName = '$nome', email = '$email', descPf = '$descPf' WHERE id_Pf = $_SESSION[id_Pf]";
                        $conn->query($updateCampos);
                    }
                }

                $sql = "SELECT * FROM prof WHERE id_Pf = $_SESSION[id_Pf]";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if (!empty($row['imgName'])) {
                        $imgPf = "upload/" . $row['imgName'];
                        
                        echo "<img src='$imgPf' class='imgPf_edit'><br><br>";

                    } 
                    if (empty($row['imgName'])) {
                        echo "<img src='./imgs/user.png' class='imgPf_edit sem_foto'><br><br>";

                    } 
                    
                    echo "<form method='POST' class='form_pf form_pf_edit' enctype='multipart/form-data'>";
                    echo"<div class='input_file'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-upload' viewBox='0 0 16 16'>
                    <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5'/>
                    <path d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z'/></svg><input type='file' name='imagem' accept='foto/'>";
                    echo "</div>";
                    echo "<div class='cont_pf cont_pf_edit'>";
                    echo "<h3 class='title_perfil title_perfil_edit'>Meus Dados</h3><br>";
                    echo "<hr>";
                    echo "<div class='area'>";
                    echo "<label class='lbl_dados'>Nome : </label><br>";
                    echo "<input type='text' class='inp_dados' name='pfName' value='" . $row["pfName"] . "'>";
                    echo "</div>";
                    echo "<div class='area'>";
                    echo "<label class='lbl_dados'>E-mail:</label><br>";
                    echo "<input type='text' class='inp_dados' name='email' value='" . $row["email"] . "'>";
                    echo "</div>";
                    echo "<div class='area'>";
                    echo "<label class='lbl_dados'>Especialidade:</label>";
                    echo "</div>";
                    echo "<div class='buttons_cat'>";
                    echo "<button type='button' class='btn btn-primary' onclick='loadServices()'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-list-check' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0'/>
                  </svg> Selecionar</button>";
                    echo "<button type='button' class='btn btn-primary'  id='btnRemoverCategoria'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                  </svg> Remover Especialidade</button>";
                    echo "</div>";
                    if (!$row['descPf'] != '') {
                    echo "<label class='lbl_dados'>Descrição :</label><br>";
                    echo "<div class='cont_descPf_textarea'>";
                    echo "<span class='span_sem_desc'> Insira uma breve descrição sobre você.</span>";
                    echo "<textarea name='descPf' class='descPf  sem_desc'>" . $row["descPf"] . "</textarea>";
                    echo "</div>";
                    }
                    if ($row['descPf'] != '') {
                    echo "<label class='lbl_dados'>Descrição :</label><br>";
                    echo "<div class='cont_descPf_textarea'>";
                    echo "<textarea name='descPf' class='descPf  '>" . $row["descPf"] . "</textarea>";
                    echo "</div>";
                    }

                    echo '</ul>';
                    echo "<button type='submit' name='atualizar' class='btn2 btn2-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-send' viewBox='0 0 16 16'>
                    <path d='M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z'/>
                  </svg> Atualizar</button>";
                    echo "</div>";
                    echo "</form>";
                    if (isset($_POST['atualizar'])) {
                        echo "<script>window.location.href='perfilPf.php'</script>";
                    }
                }

            } else {
                echo "ID do usuário não encontrado.";
            }
            ?>
        </div>
    </div>

    <div class="cats">
        <div id='servicesContainer'></div>
        <div id="removerCategoriaContainer"></div>
    </div>

    <script>
        function loadServices() {
            $.ajax({
                url: 'servicesPf.php',
                type: 'GET',
                success: function (response) {
                    var closeButton = '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeServicesContainer()"><span aria-hidden="true">&times;</span></button>';
                    $('#servicesContainer').html(closeButton + response);
                },
                error: function (error) {
                    console.error('Erro:', error);
                }
            });
        }

        function closeServicesContainer() {
            $('#servicesContainer').html('');
        }
        function closeRemoveServicesForm() {
            $('#removerCategoriaContainer').html('');
        }

        function loadRemoveServicesForm() {
            var container = document.getElementById('removerCategoriaContainer');

            // Requisição AJAX para carregar o conteúdo de removeServicesPf.php
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'removeServicesPf.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    container.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        document.getElementById('btnRemoverCategoria').addEventListener('click', loadRemoveServicesForm);
    </script>
    <script>
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');
    var file = input.files[0];

    // Verifica se um arquivo foi selecionado
    if (file) {
        var reader = new FileReader();

        // Define a função de callback para quando a imagem for carregada
        reader.onload = function() {
            preview.src = reader.result; // Define o src da tag img para o conteúdo lido do arquivo
        }

        // Lê o conteúdo do arquivo como uma URL de dados
        reader.readAsDataURL(file);
    } else {
        preview.src = ''; // Limpa o src da tag img se nenhum arquivo for selecionado
    }
}
</script>
</body>

</html>