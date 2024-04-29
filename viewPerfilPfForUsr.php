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
    <link rel="stylesheet" type="text/css" href="./css/viewPerfilPfForUsr.css">
    <meta charset="UTF-8">
    <title>Perfil do usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                    if(!empty($imgPf = $row['imgName'])){
                        $imgPf = 'upload/' . $row['imgName'];
                    }
                    

                    echo"<div class='top'>";
                    echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
                    echo "<h2>{$row['pfName']}</h2>" . "<br>";
                        echo "
                        <div class='avaliacao'>
                                <input type='hidden' name='id_Pf' value='<?php echo $_SESSION[id_Pf]; ?>'>
                                <fieldset class='estrelas'>
                                    <input type='radio' id='star5' name='rating' value='5' /><label for='star5' title='Excelente'></label>
                                    <input type='radio' id='star4' name='rating' value='4' /><label for='star4' title='Muito bom'></label>
                                    <input type='radio' id='star3' name='rating' value='3' /><label for='star3' title='Bom'></label>
                                    <input type='radio' id='star2' name='rating' value='2' /><label for='star2' title='Ruim'></label>
                                    <input type='radio' id='star1' name='rating' value='1' /><label for='star1' title='Muito ruim'> </label>
                                </fieldset>
                        </div>";
                    echo"</div>";
                    echo "<div class='ajustCat'>";
                    

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
                    
                    if (!empty($row['descPf'])) {
                        echo "<label id='lbl_desc'>Descrição:</label><br>";
                        echo "<p class='descPf'>{$row['descPf']}</p>";
                    }
                    echo "<a href='services.php' id='btn-contratar'>contratar</a>";
                } else {
                    echo "Nenhum perfil encontrado.";
                }
            } else {
                echo "ID do usuário não encontrado.";
            }
            ?>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>
</body>

</html>