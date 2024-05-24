<?php
include_once ('connect.php');
if (!isset($_SESSION)) {
    session_start();
}
$id_Pf = $_SESSION['id_Pf'];
header('Content-Type: text/html; charset=utf-8');
unset($_SESSION['notification']);

$sql = "SELECT * FROM prof WHERE id_Pf = $id_Pf";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pfName = $row['pfName'];
        $imgPf = $row['imgName'];
        $descPf = $row['descPf'];
    }
    if ($imgPf != null) {
        $imgPf = "upload/" . $imgPf;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="uft-8">
    <title>Avaliação por Estrelas</title>
    <link rel="stylesheet" href="./css/avaliar.css">
</head>

<body>
    <section class="avaliar">
            <div class="dados_pf_avaliar">
                <div id="img_avaliar">
                <img src="<?php echo $imgPf ?>" alt="">
                </div>
                <p class="p_avaliar name"><?php echo $pfName ?></p>
            </div>
            <form action="avaliacaoBd.php" class="form_avaliar" method="post">
                <label for="estrelas" class='lbl_avaliacao'>Avalie o serviço desse profissional:</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="estrelas" value="5"><label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="estrelas" value="4"><label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="estrelas" value="3"><label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="estrelas" value="2"><label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="estrelas" value="1"><label for="star1">&#9733;</label>
                </div>
                <label for="mensagem_avaliacao" class='lbl_avaliacao'>Escreva brevemente sobre como foi sua experiência com o servico de:</label>
                <?php echo"<br><span id='focoNome'>$pfName</span>"?>
                <textarea name="mensagem_avaliacao" id="text_avaliacao"></textarea>
                <input type="hidden" name="id_Pf" value="<?php echo $id_Pf ?>"> <!-- Id do produto a ser avaliado -->
                <button type="submit" class="btn-avaliar">Avaliar</button>
            </form>
    </section>
</body>

</html>