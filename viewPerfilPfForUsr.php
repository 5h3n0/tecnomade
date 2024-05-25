<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "connect.php";
require_once 'navUsr.php';


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

    <style>
    .top {
       background-image: url("./imgs/1110251_Animation_Envelope_Glow_1280x720.gif");
       background-size: cover;
       filter: brightness(0.5);
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
                    if(!empty($row['imgName'])){
                        $imgPf = 'upload/' . $row['imgName'];
                    }
                    

                    echo"<div class='top'>";
                    echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
                    echo "
                    <div class='avaliacao'>
                    <h2 class='nome_profissional_tt'>{$row['pfName']}</h2>
                    <input type='hidden' name='id_Pf' value='<?php echo $_SESSION[id_Pf_paraUsr]; ?>'>
                    <fieldset class='estrelas'>
                                    <input type='radio' id='star5' name='rating' value='5' /><label for='star5' title='Excelente'></label>
                                    <input type='radio' id='star4' name='rating' value='4' /><label for='star4' title='Muito bom'></label>
                                    <input type='radio' id='star3' name='rating' value='3' /><label for='star3' title='Bom'></label>
                                    <input type='radio' id='star2' name='rating' value='2' /><label for='star2' title='Ruim'></label>
                                    <input type='radio' id='star1' name='rating' value='1' /><label for='star1' title='Muito ruim'> </label>
                                    </fieldset>
                                    </div>";
                    echo "<a href='services.php' id='btn-contratar'>contratar</a>";
                    echo"</div>";
                    echo "<div class='ajustCat'>";

                    echo "<div class='box_dados_pf_dd_cat_desc'>";
                    
                    echo "<div class='dd_info_pf'>";

                    $dataNsc = $row['dtNasPf'];
                    $dataNscFormat = date('d/m/Y',strtotime($dataNsc));
                   
                    $yearCalc = date('Y', strtotime($dataNsc));
                  
                    $idade = date('Y') - $yearCalc;

                    echo "<label id='lbl_cat'>Dados do Profissional:</label>
                       <p><span>Data de Nascimento: </span> $dataNscFormat ( $idade Anos )</p>
                    "; 
                    
                    if ( $row['gender'] == 'm' ){
                        echo "<p><span>Gênero:</span> Masculino</p>";
                    } else if ($row['gender'] == 'f'){
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

        <hr class="divis_line_green">
        
        <div class="bloco_comentarios_pf">
            <div class="tt_coments_for_pf">
                <h2>Comentários dos Clientes ao Profissional</h2>
            </div>
            <div class="comentario_for_pf"><h3>[ Nenhum comentário foi feito para o profissional ainda ... ]</h3></div>
            
        </div>

        <hr class="divis_line_green">
        
        <div class="bloco_work_do_for_pf">
            <div class="tt_work_do_for_pf">
                <h2 class="text_null_coments_insire">Outros trabalhos feitos pelo profissional</h2>
            </div>

            <div class="work_do_for_pf"><h3 class="text_null_work" style="display: none;">Nenhum comentário foi feito para o profissional ainda ...</h3></div>






<!-- ----------------------------------------------------------------------- -->








<div class="carrossel_works_pf">
        <div class="carousel_inner_pf">
            <div class="item_slide_of_car slide_active_pf">
                <img src="https://images.unsplash.com/photo-1520531158340-44015069e78e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8d2hpdGUlMjBjaXR5fGVufDB8fDB8fHww" alt="Imagem 1">
                <div class="info_about_work">
                <h2>Titulo</h2>
                <p>dd/mm/year</p>
                <p>Descrição do trampo</p>
                </div>
            </div>
            <div class="item_slide_of_car">
                <img src="https://media.licdn.com/dms/image/C4E1BAQEvhN4dTQBoiw/company-background_10000/0/1584480540011/uptown4_inc__cover?e=2147483647&v=beta&t=Ix1NyhX1CDMwkgrbvEdlKe6Wcd8sc13DaFJU2eEvof4" alt="Imagem 2">
                <div class="info_about_work">
                <h2>Titulo</h2>
                <p>dd/mm/year</p>
                <p>Descrição do trampo</p>
                </div>
            </div>
            <div class="item_slide_of_car">
                <img src="https://w0.peakpx.com/wallpaper/421/390/HD-wallpaper-paisagem-preto-branco-ponte-natureza-paisagem-branco-preto-luz.jpg" alt="Imagem 3">
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
            <button class="bnt_left" ><span class="icon_btn_left"><</span></button>
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