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
    
    <link rel="stylesheet" type="text/css" href="./css/viewPerfilPfForUsr.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut" type="image/png" sizes="15px15px" href="./imgs/img_logo_black_and_white.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <title>Profissional</title>

</head>

<body>
    <div class="cont">
        <div class="container_perfil">
            
            <?php
            if (isset($_SESSION['id_Pf'])) {
                $sql = "SELECT * FROM prof WHERE id_Pf = {$_SESSION['id_Pf']}";
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
                    <input type='hidden' name='id_Pf' value='<?php echo $_SESSION[id_Pf]; ?>'>
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

                    $comando = "SELECT * FROM enderecos WHERE id_Pf = {$_SESSION['id_Pf']}";

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
    </div>

    <?php
    include "footer.php";
    ?>
</body>

</html>