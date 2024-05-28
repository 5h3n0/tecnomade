<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "connect.php";
require_once 'navUsr.php';

$sql_estrelas = "SELECT AVG(estrelas) AS average FROM avaliacoes WHERE id_Pf = ?";
                    $stmt = $conn->prepare($sql_estrelas);
                    $stmt->bind_param("i", $_SESSION['id_Pf_paraUsr']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row_estrelas = $result->fetch_assoc();
                    $media_estrelas = $row_estrelas['average'];
        
                    $star_yellow = '<svg height="40px" version="1.1" class="star" viewBox="0 0 58 58" width="35px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="019---Star" transform="translate(-1.000000, 0.000000)"><path d="M31.7569,1.14435 L39.2006,16.94809 C39.4742047,17.5450605 40.0274966,17.9662669 40.67576,18.07109 L57.32037,20.60534 C58.0728338,20.7512497 58.6840769,21.2991656 58.9110909,22.0312558 C59.1381048,22.7633461 58.9440977,23.560962 58.4062,24.107 L46.36205,36.40845 C45.8969861,36.8906851 45.6879532,37.5647752 45.79858,38.22553 L48.64182,55.59553 C48.7969313,56.3422303 48.5093863,57.1116407 47.9025754,57.5735945 C47.2957646,58.0355484 46.4775729,58.1079148 45.7991,57.75964 L30.9117,49.55864 C30.3445605,49.2442297 29.6554395,49.2442297 29.0883,49.55864 L14.2009,57.75964 C13.5224271,58.1079148 12.7042354,58.0355484 12.0974246,57.5735945 C11.4906137,57.1116407 11.2030687,56.3422303 11.35818,55.59553 L14.20142,38.22553 C14.3120468,37.5647752 14.1030139,36.8906851 13.63795,36.40845 L1.5938,24.107 C1.05593046,23.5609597 0.861941478,22.7633618 1.08895299,22.0312898 C1.31596449,21.2992177 1.92718692,20.7513115 2.67963,20.60539 L19.32424,18.0711 C19.9725034,17.9662769 20.5257953,17.5450705 20.7994,16.9481 L28.2431,1.14435 C28.5505421,0.448721422 29.2394609,-5.16717968e-06 30,-5.16717968e-06 C30.7605391,-5.16717968e-06 31.4494579,0.448721422 31.7569,1.14435 Z" fill="#F6AB27" id="Shape"/><path d="M37.39,13.11 C32.5890747,15.6770414 28.15587,18.8791741 24.21,22.63 C20.0044812,26.6560517 16.436883,31.2993247 13.63,36.4 L1.59009,24.11 C1.05224467,23.5636351 0.858777828,22.7655877 1.086713,22.0335783 C1.31464817,21.3015689 1.92698179,20.7544339 2.67993,20.61 L19.32007,18.07 C19.967444,17.9624793 20.520694,17.5438036 20.80007,16.95 L28.24,1.14 C28.5507895,0.446404951 29.2399578,1.95277886e-05 30,1.95277886e-05 C30.7600422,1.95277886e-05 31.4492105,0.446404951 31.76,1.14 L37.39,13.11 Z" fill="#F4CD1E" id="Shape"/></g></g></svg>';
                     
                    $star_gray = '<svg height="40px" version="1.1" class="star" viewBox="0 0 58 58" width="35px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g fill="gray" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g id="019---Star" transform="translate(-1.000000, 0.000000)"><path d="M31.7569,1.14435 L39.2006,16.94809 C39.4742047,17.5450605 40.0274966,17.9662669 40.67576,18.07109 L57.32037,20.60534 C58.0728338,20.7512497 58.6840769,21.2991656 58.9110909,22.0312558 C59.1381048,22.7633461 58.9440977,23.560962 58.4062,24.107 L46.36205,36.40845 C45.8969861,36.8906851 45.6879532,37.5647752 45.79858,38.22553 L48.64182,55.59553 C48.7969313,56.3422303 48.5093863,57.1116407 47.9025754,57.5735945 C47.2957646,58.0355484 46.4775729,58.1079148 45.7991,57.75964 L30.9117,49.55864 C30.3445605,49.2442297 29.6554395,49.2442297 29.0883,49.55864 L14.2009,57.75964 C13.5224271,58.1079148 12.7042354,58.0355484 12.0974246,57.5735945 C11.4906137,57.1116407 11.2030687,56.3422303 11.35818,55.59553 L14.20142,38.22553 C14.3120468,37.5647752 14.1030139,36.8906851 13.63795,36.40845 L1.5938,24.107 C1.05593046,23.5609597 0.861941478,22.7633618 1.08895299,22.0312898 C1.31596449,21.2992177 1.92718692,20.7513115 2.67963,20.60539 L19.32424,18.0711 C19.9725034,17.9662769 20.5257953,17.5450705 20.7994,16.9481 L28.2431,1.14435 C28.5505421,0.448721422 29.2394609,-5.16717968e-06 30,-5.16717968e-06 C30.7605391,-5.16717968e-06 31.4494579,0.448721422 31.7569,1.14435 Z" fill="gray" id="Shape"/><path d="M37.39,13.11 C32.5890747,15.6770414 28.15587,18.8791741 24.21,22.63 C20.0044812,26.6560517 16.436883,31.2993247 13.63,36.4 L1.59009,24.11 C1.05224467,23.5636351 0.858777828,22.7655877 1.086713,22.0335783 C1.31464817,21.3015689 1.92698179,20.7544339 2.67993,20.61 L19.32007,18.07 C19.967444,17.9624793 20.520694,17.5438036 20.80007,16.95 L28.24,1.14 C28.5507895,0.446404951 29.2399578,1.95277886e-05 30,1.95277886e-05 C30.7600422,1.95277886e-05 31.4492105,0.446404951 31.76,1.14 L37.39,13.11 Z" fill="white" id="Shape"/></g></g></svg>';
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/viewPerfilPfForUsr.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


    <style>
        .top {
            background-image: url("./imgs/1110251_Animation_Envelope_Glow_1280x720.gif");
            background-size: cover;
            /* filter: brightness(0.5) ; */
            object-fit: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

    <title>Profissional</title>

</head>

<body>
    <div class="cont">
        <div class="container_perfil">
            <?php
            if (isset($_SESSION['id_Pf_paraUsr'])) {
                $sql = "SELECT * FROM prof WHERE id_Pf = {$_SESSION['id_Pf_paraUsr']}";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (!empty($row['imgName'])) {
                        $imgPf = 'upload/' . $row['imgName'];
                    }

                    echo "<div class='top'>";
                    echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
                    echo "
                    <div class='avaliacao'>
                    <h2 class='nome_profissional_tt'>{$row['pfName']}</h2>
                    <input type='hidden' name='id_Pf' value='<?php echo $_SESSION[id_Pf_paraUsr]; ?>'>";
    if ($media_estrelas !== null) {
        // Formatar a média para exibir no máximo duas casas decimais
        $media_estrelas_formatada = number_format($media_estrelas, 2);

        if ($media_estrelas_formatada >= 5) {

            for ($cont = 0; $cont < 5; $cont++) {
                echo $star_yellow;
            }

        } else if ($media_estrelas_formatada >= 4) {
            for ($cont = 0; $cont < 4; $cont++) {
                echo $star_yellow;
            }
            for ($i = 1; $i < 2; $i++) {
                echo $star_gray;
            }
        } else if ($media_estrelas_formatada >= 3) {
            for ($cont = 0; $cont < 3; $cont++) {
                echo $star_yellow;
            }
            for ($i = 0; $i < 2; $i++) {
                echo $star_gray;
            }
        } else if ($media_estrelas_formatada >= 2) {
            for ($cont = 0; $cont < 2; $cont++) {
                echo $star_yellow;
            }
            for ($cont = 0; $cont < 3; $cont++) {
                echo $star_gray;
            }
        } else {
            echo $star_yellow;
            for ($cont = 0; $cont < 4; $cont++) {
                echo $star_gray;
            }
        }


    } else {
        echo "Profissional ainda não avaliado.";
    }


















                   
                                echo"</div>";
                    echo "<a href='services.php' id='btn-contratar'>contratar</a>";
                    echo "</div>";
                    echo "<div class='ajustCat'>";

                    echo "<div class='box_dados_pf_dd_cat_desc'>";

                    echo "<div class='dd_info_pf'>";

                    $dataNsc = $row['dtNasPf'];
                    $dataNscFormat = date('d/m/Y', strtotime($dataNsc));

                    $yearCalc = date('Y', strtotime($dataNsc));

                    $idade = date('Y') - $yearCalc;

                    echo "<label id='lbl_cat'>Dados do Profissional:</label>
                       <p><span>Data de Nascimento: </span> $dataNscFormat ( $idade Anos )</p>
                    ";

                    if ($row['gender'] == 'm') {
                        echo "<p><span>Gênero:</span> Masculino</p>";
                    } else if ($row['gender'] == 'f') {
                        echo "<p><span>Gênero:</span> Feminino</p>";
                    } else {
                        echo "<p><span>Gênero:</span> Prefiro Não identificar</p>";
                    }

                    // include_once "portifolio.php";
            
                    $comando = "SELECT * FROM enderecos WHERE id_Pf = {$_SESSION['id_Pf_paraUsr']}";

                    $resultBusca = mysqli_query($conn, $comando);

                    if ($resultBusca) {
                        $endereco = mysqli_fetch_assoc($resultBusca);
                        echo "<p><span>Local de atuação:</span> {$endereco['cidade']}</p>";
                    } else {
                        echo "Nenhum endereço encontrado para este usuário.";
                    }

                    echo "</div>";

                    echo "<div class='ajust_div_cat'>";

                    echo "<label id='cat'>Categorias de Serviços:</label>";

                    echo '<ul class="cat">';
                    $catSql = "SELECT categorias.nome
                    FROM cat_sel
                    INNER JOIN categorias ON cat_sel.id_Cat = categorias.id_Cat
                    WHERE cat_sel.id_Pf = {$row['id_Pf']}";
                    $catResult = $conn->query($catSql);
                    while ($catRow = $catResult->fetch_assoc()) {
                        echo "<li>{$catRow['nome']}</li>";
                    }
                    echo '</ul>';
                    echo "</div>";


                    echo "<div class=''>";
                    if (!empty($row['descPf'])) {
                        echo "<label id='lbl_desc'>Descrição:</label><br>";
                        echo "<p class='descPf'>{$row['descPf']}</p>";
                    }
                } else {
                    echo "Nenhum perfil encontrado.";
                }
            } else {
                echo "ID do usuário não encontrado.";
            }
            echo "</div>";
            ?>
        </div>
        <?php
        $sql_endereco = "SELECT cep FROM enderecos WHERE id_Pf = {$_SESSION['id_Pf_paraUsr']}";
        $result_endereco = $conn->query($sql_endereco);
        if ($result_endereco->num_rows > 0) {
            $row_endereco = $result_endereco->fetch_assoc();
            echo "<div class='endereco'>";
            echo "<h2 id='lbl_regiao'> Região do Profissional</h2>";
            echo '
                <div style="padding: 10px 0 0; clear: both">
                    <iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=' . $row_endereco['cep'] . '&output=embed"></iframe>
                </div>';
            echo "</div>";
        }
        ?>
        <hr class="divis_line_green">

        <div class="bloco_comentarios_pf">
            <div class="tt_coments_for_pf">
                <h2>Comentários dos Clientes ao Profissional</h2>
            </div>
            <div class="comentario_for_pf">
                <?php 
                $sql_mensagens = "SELECT mensagem_avaliacao FROM avaliacoes WHERE id_Pf = '$_SESSION[id_Pf_paraUsr]'";
                $result_mensagens = $conn->query($sql_mensagens);
                $row_mensagens = $result_mensagens->fetch_assoc();
                if($row_mensagens['mensagem_avaliacao'] == null){
                    echo"<h3>[ Nenhum comentário foi feito para o profissional ainda ... ]</h3>";
                }else{
                echo"<h3>". $row_mensagens['mensagem_avaliacao']."</h3>";  
                }              
                ?>
            </div>

        </div>

        <hr class="divis_line_green">

        <div class="bloco_work_do_for_pf">
            <div class="tt_work_do_for_pf">
                <h2 class="text_null_coments_insire">Outros trabalhos feitos pelo profissional</h2>
            </div>

            <div class="work_do_for_pf">
                <h3 class="text_null_work" style="display: none;">Nenhum comentário foi feito para o profissional ainda
                    ...</h3>
            </div>






            <!-- ----------------------------------------------------------------------- -->








            <div class="carrossel_works_pf">
                <div class="carousel_inner_pf">
                    <div class="item_slide_of_car slide_active_pf">
                        <img src="https://images.unsplash.com/photo-1520531158340-44015069e78e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8d2hpdGUlMjBjaXR5fGVufDB8fDB8fHww"
                            alt="Imagem 1">
                        <div class="info_about_work">
                            <h2>Titulo</h2>
                            <p>dd/mm/year</p>
                            <p>Descrição do trampo</p>
                        </div>
                    </div>
                    <div class="item_slide_of_car">
                        <img src="https://media.licdn.com/dms/image/C4E1BAQEvhN4dTQBoiw/company-background_10000/0/1584480540011/uptown4_inc__cover?e=2147483647&v=beta&t=Ix1NyhX1CDMwkgrbvEdlKe6Wcd8sc13DaFJU2eEvof4"
                            alt="Imagem 2">
                        <div class="info_about_work">
                            <h2>Titulo</h2>
                            <p>dd/mm/year</p>
                            <p>Descrição do trampo</p>
                        </div>
                    </div>
                    <div class="item_slide_of_car">
                        <img src="https://w0.peakpx.com/wallpaper/421/390/HD-wallpaper-paisagem-preto-branco-ponte-natureza-paisagem-branco-preto-luz.jpg"
                            alt="Imagem 3">
                        <div class="info_about_work">
                            <h2>Titulo</h2>
                            <p>dd/mm/year</p>
                            <p>Descrição do trampo</p>
                        </div>
                    </div>
                </div>

                <ul class="carousel_indicators">
                    <li class="indicatodor_car indicatodor_active" data-slide-to="0"></li>
                    <li class="indicatodor_car" data-slide-to="1"></li>
                    <li class="indicatodor_car" data-slide-to="2"></li>
                </ul>

                <div class="carousel_control">
                    <button class="bnt_left"><span class="icon_btn_left">
                            << /span></button>
                    <button class="bnt_right"><span class="icon_btn_right">></span></button>
                </div>
            </div>













            <!-- ----------------------------------------------------------------------- -->





        </div>
    </div>
    <script src="./js/carrossel_pf.js"></script>

    <?php
    include "footer.php";
    ?>
</body>

</html>