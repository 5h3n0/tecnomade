<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <title>Profissional</title>
    <link rel="stylesheet" href="./css/prof.css">
    <link rel="stylesheet" href="./css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <style>
        .bloco_pf_st {
            background-image: url("./imgs/technology_back.gif");
            background-size: cover;
            background-position: center;
            box-shadow: inset 0 0 60px black;
            overflow: auto;
        }

    </style>
</head>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['usrLogado']) {
    require_once 'navHome.php';
}
if ($_SESSION['usrLogado']) {
    require_once 'navUsr.php';
}
require_once 'connect.php';



$sql = "SELECT * FROM prof ORDER BY RAND()";
$result = $conn->query($sql);

$profissionals = array();
while ($row = $result->fetch_assoc()) {
    $profissionals[] = $row;
}

?>



<section class="cont_prof_bloco">
    <div class="bloco_pf_st profissionals">
        <?php foreach ($profissionals as $professional): ?>
            <?php
            $serviceCountQuery = "SELECT COUNT(*) AS service_count FROM services WHERE id_Pf = ?";
            $serviceCountStmt = $conn->prepare($serviceCountQuery);
            $serviceCountStmt->bind_param('i', $professional['id_Pf']);
            $serviceCountStmt->execute();
            $serviceCountResult = $serviceCountStmt->get_result();
            $serviceCountRow = $serviceCountResult->fetch_assoc();

            // Verificar se o profissional possui pelo menos um serviço
            if (empty($serviceCountRow['service_count']) || $serviceCountRow['service_count'] == 0) {
                // Se não houver serviços, defina $imgPf como a imagem do profissional e continue para o próximo profissional
                $imgPf = 'upload/' . $professional['imgName'];
                continue;
            }


            ?>
            <div class="professional" data-id="<?= $professional['id_Pf'] ?>">

                <img src='<?php echo "upload/" . $professional['imgName'] ?>' alt="Imagem do Profissional"><br><br>
                <h3 class="name_prof_perfil">
                    <?= $professional['pfName'] ?>
                </h3>
                <p class="title_card_esp">Avaliação média</p>
                <?php
                
                $sql_estrelas = "SELECT AVG(estrelas) AS average FROM avaliacoes WHERE id_Pf = ?";
                $stmt = $conn->prepare($sql_estrelas);
                $stmt->bind_param("i", $professional['id_Pf']);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $media_estrelas = $row['average'];
                    // Verificar se a média é nula antes de formatá-la
                    if ($media_estrelas !== null) {
                        // Formatar a média para exibir no máximo duas casas decimais
                        $media_estrelas_formatada = number_format($media_estrelas, 2);
                        echo "A média das estrelas é: " . $media_estrelas_formatada;
                    } else {
                        echo "Profissional ainda não avaliado.";
                    }
                } else {
                    echo "Profissional ainda não avaliado.";
                }
                
                
                ?>
                <p class="title_card_esp">Especialidades:</p>
                <ul class="list_esp_card_pf">
                    <?php
                    $catSql = "SELECT categorias.nome
                       FROM cat_sel
                       INNER JOIN categorias ON cat_sel.id_Cat = categorias.id_Cat
                       WHERE cat_sel.id_Pf = {$professional['id_Pf']}
                       LIMIT 3";
                    $catResult = $conn->query($catSql);

                    $counter = 0;

                    while ($catRow = $catResult->fetch_assoc()) {
                        echo "<li>{$catRow['nome']}</li>";
                        $counter++;
                    }


                    if ($counter > 2) {
                        echo "<p class='ver_mais_descrip_pf'>...</p>";
                    }
                    ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<div class="profDetails">
    <div class="details">
        <button class="closeBtn">X</button><br>
        <img src="" alt="Imagem do Profissional" id="profImage"><br><br>
        <h3 id="profName"></h3>
        <p id="profCat"></p>
        <h3 id="description_pf_perfil">Descrição</h3>
        <p id="profDescription"></p>
        <?php
        echo "<form action='viewPerfilPfForUsr.php' method='post'>";
        echo "<input type='button' class='btn_ver_pf_card' name='verPerfil' value='Ver Perfil' onclick='redirectToNewPage()'>";
        echo "</form>";
        ?>
    </div>
</div>

<?php include_once('footer.php');?>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        $('.professional').click(function () {
            console.log("Cliquei em um profissional");
            var id = $(this).data('id');
            console.log("ID do profissional:", id);
            var $profDetails = $('.profDetails');

            // Enviar uma requisição AJAX para recuperar as especialidades e a imagem do profissional com base no ID
            $.ajax({
                url: 'pfFloat.php', // Altere para o arquivo que irá buscar as especialidades e a imagem
                method: 'POST',
                data: { id: id },
                success: function (response) {
                    console.log("Resposta do servidor:", response);
                    var data = JSON.parse(response);
                    
                    // Exibir a imagem do profissional na caixa flutuante
                    $profDetails.find('#profImage').attr('src', 'upload/' + data.imgName);

                    // Exibir as especialidades do profissional na caixa flutuante
                    var categoriesList = '';
                    data.categories.forEach(function (category) {
                        categoriesList += '<li>' + category + '</li>';
                    });
                    $profDetails.find('#profCat').html('<h3>Especialidades:</h3> <ul>' + categoriesList + '</ul>');
                    $profDetails.find('#profName').text(data.name);
                    
                    // Exibir a descrição do profissional na caixa flutuante
                    $profDetails.find('#profDescription').text(data.description);
                    
                    // Posicionar a caixa flutuante ao lado do perfil clicado
                    var profileOffset = $('.professional[data-id="' + id + '"]').offset();
                    var profileWidth = $('.professional[data-id="' + id + '"]').outerWidth();
                    var profDetailsWidth = $profDetails.outerWidth();
                    
                    var leftPosition = profileOffset.left + profileWidth + 10; // Adiciona um espaço de 10px entre o perfil e a caixa flutuante
                    var topPosition = profileOffset.top;
                    
                    $profDetails.css({
                        display: 'block' // Mostra a caixa flutuante
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Erro ao fazer a requisição AJAX:", error);
                }
            });
        });

        // Fechar a caixa flutuante ao clicar no botão Fechar
        $('.closeBtn').click(function () {
            $('.profDetails').fadeOut();
        });
    });
    function redirectToNewPage() {
        window.location.href = 'viewPerfilPfForUsr.php';
    }

    
    let bloco_pf_st_div = document.querySelector(".bloco_pf_st"); 
let div_prof = document.querySelectorAll(".professional");

div_prof.forEach(function(element) {
    element.addEventListener("click", function(){
        bloco_pf_st_div.style.transition = "1s";
        bloco_pf_st_div.style.filter = "brightness(0.2)";
    });
});

let btn_close_card = document.querySelectorAll(".closeBtn");

btn_close_card.forEach(function(element) {
    element.addEventListener("click", function(){
        bloco_pf_st_div.style.transition = "1s";
        bloco_pf_st_div.style.filter = "brightness(1)";
    });
});


</script>
</html>