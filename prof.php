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
        
                    $star_yellow = '<svg height="58px" version="1.1" viewBox="0 0 58 58" width="58px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="019---Star" transform="translate(-1.000000, 0.000000)"><path d="M31.7569,1.14435 L39.2006,16.94809 C39.4742047,17.5450605 40.0274966,17.9662669 40.67576,18.07109 L57.32037,20.60534 C58.0728338,20.7512497 58.6840769,21.2991656 58.9110909,22.0312558 C59.1381048,22.7633461 58.9440977,23.560962 58.4062,24.107 L46.36205,36.40845 C45.8969861,36.8906851 45.6879532,37.5647752 45.79858,38.22553 L48.64182,55.59553 C48.7969313,56.3422303 48.5093863,57.1116407 47.9025754,57.5735945 C47.2957646,58.0355484 46.4775729,58.1079148 45.7991,57.75964 L30.9117,49.55864 C30.3445605,49.2442297 29.6554395,49.2442297 29.0883,49.55864 L14.2009,57.75964 C13.5224271,58.1079148 12.7042354,58.0355484 12.0974246,57.5735945 C11.4906137,57.1116407 11.2030687,56.3422303 11.35818,55.59553 L14.20142,38.22553 C14.3120468,37.5647752 14.1030139,36.8906851 13.63795,36.40845 L1.5938,24.107 C1.05593046,23.5609597 0.861941478,22.7633618 1.08895299,22.0312898 C1.31596449,21.2992177 1.92718692,20.7513115 2.67963,20.60539 L19.32424,18.0711 C19.9725034,17.9662769 20.5257953,17.5450705 20.7994,16.9481 L28.2431,1.14435 C28.5505421,0.448721422 29.2394609,-5.16717968e-06 30,-5.16717968e-06 C30.7605391,-5.16717968e-06 31.4494579,0.448721422 31.7569,1.14435 Z" fill="#F6AB27" id="Shape"/><path d="M37.39,13.11 C32.5890747,15.6770414 28.15587,18.8791741 24.21,22.63 C20.0044812,26.6560517 16.436883,31.2993247 13.63,36.4 L1.59009,24.11 C1.05224467,23.5636351 0.858777828,22.7655877 1.086713,22.0335783 C1.31464817,21.3015689 1.92698179,20.7544339 2.67993,20.61 L19.32007,18.07 C19.967444,17.9624793 20.520694,17.5438036 20.80007,16.95 L28.24,1.14 C28.5507895,0.446404951 29.2399578,1.95277886e-05 30,1.95277886e-05 C30.7600422,1.95277886e-05 31.4492105,0.446404951 31.76,1.14 L37.39,13.11 Z" fill="#F4CD1E" id="Shape"/></g></g></svg>';
                     
                    $star_gray = '<svg height="58px" version="1.1" viewBox="0 0 58 58" width="58px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g fill="gray" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="019---Star" transform="translate(-1.000000, 0.000000)"><path d="M31.7569,1.14435 L39.2006,16.94809 C39.4742047,17.5450605 40.0274966,17.9662669 40.67576,18.07109 L57.32037,20.60534 C58.0728338,20.7512497 58.6840769,21.2991656 58.9110909,22.0312558 C59.1381048,22.7633461 58.9440977,23.560962 58.4062,24.107 L46.36205,36.40845 C45.8969861,36.8906851 45.6879532,37.5647752 45.79858,38.22553 L48.64182,55.59553 C48.7969313,56.3422303 48.5093863,57.1116407 47.9025754,57.5735945 C47.2957646,58.0355484 46.4775729,58.1079148 45.7991,57.75964 L30.9117,49.55864 C30.3445605,49.2442297 29.6554395,49.2442297 29.0883,49.55864 L14.2009,57.75964 C13.5224271,58.1079148 12.7042354,58.0355484 12.0974246,57.5735945 C11.4906137,57.1116407 11.2030687,56.3422303 11.35818,55.59553 L14.20142,38.22553 C14.3120468,37.5647752 14.1030139,36.8906851 13.63795,36.40845 L1.5938,24.107 C1.05593046,23.5609597 0.861941478,22.7633618 1.08895299,22.0312898 C1.31596449,21.2992177 1.92718692,20.7513115 2.67963,20.60539 L19.32424,18.0711 C19.9725034,17.9662769 20.5257953,17.5450705 20.7994,16.9481 L28.2431,1.14435 C28.5505421,0.448721422 29.2394609,-5.16717968e-06 30,-5.16717968e-06 C30.7605391,-5.16717968e-06 31.4494579,0.448721422 31.7569,1.14435 Z" fill="gray" id="Shape"/><path d="M37.39,13.11 C32.5890747,15.6770414 28.15587,18.8791741 24.21,22.63 C20.0044812,26.6560517 16.436883,31.2993247 13.63,36.4 L1.59009,24.11 C1.05224467,23.5636351 0.858777828,22.7655877 1.086713,22.0335783 C1.31464817,21.3015689 1.92698179,20.7544339 2.67993,20.61 L19.32007,18.07 C19.967444,17.9624793 20.520694,17.5438036 20.80007,16.95 L28.24,1.14 C28.5507895,0.446404951 29.2399578,1.95277886e-05 30,1.95277886e-05 C30.7600422,1.95277886e-05 31.4492105,0.446404951 31.76,1.14 L37.39,13.11 Z" fill="white" id="Shape"/></g></g></svg>';


                    // Verificar se a média é nula antes de formatá-la
                    if ($media_estrelas !== null) {
                        // Formatar a média para exibir no máximo duas casas decimais
                        $media_estrelas_formatada = number_format($media_estrelas, 2);
                        
                        if( $media_estrelas_formatada >= 5 ){

                            for ($cont=0; $cont < 5 ; $cont++) { 
                                    echo $star_yellow;             
                            }

                        } else if ( $media_estrelas_formatada >= 4 ){
                            for ($cont=0; $cont < 4 ; $cont++) { 
                                echo $star_yellow;          
                            }
                            for ($i=1; $i < 2; $i++) { 
                                echo $star_gray;
                            }              
                        } else if ( $media_estrelas_formatada >= 3 ){
                            for ($cont=0; $cont < 3; $cont++) { 
                                echo $star_yellow;
                            }
                            for ($i=0; $i < 2; $i++) {
                                echo $star_gray;
                            }
                        } else if ( $media_estrelas_formatada >= 2 ){
                            for ($cont=0; $cont < 2 ; $cont++) { 
                                echo $star_yellow;
                            }
                            for ($cont=0; $cont < 3 ; $cont++) { 
                                echo $star_gray; 
                            }
                    }else{
                        echo $star_yellow;
                        for ($cont=0; $cont < 4 ; $cont++) { 
                            echo $star_gray; 
                        }
                    }


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