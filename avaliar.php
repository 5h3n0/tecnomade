<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$id_Pf = $_SESSION['id_Pf'];
header('Content-Type: text/html; charset=utf-8');
unset($_SESSION['notification']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <title>Avaliação por Estrelas</title>
    <style>
        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 20px;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label {
            color: #f2b600;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f2b600;
        }
    </style>
</head>
<body>
    <a href="avaliar.php">avaliar</a>
    <a href="media.php"> media</a>
    <form action="avaliacaoBd.php" method="post">
        <div class="star-rating">
            <input type="radio" id="star5" name="estrelas" value="5"><label for="star5">☆</label>
            <input type="radio" id="star4" name="estrelas" value="4"><label for="star4">☆</label>
            <input type="radio" id="star3" name="estrelas" value="3"><label for="star3">☆</label>
            <input type="radio" id="star2" name="estrelas" value="2"><label for="star2">☆</label>
            <input type="radio" id="star1" name="estrelas" value="1"><label for="star1">☆</label>
        </div>
        <input type="hidden" name="id_Pf" value="<?php echo $id_Pf ?>"> <!-- Id do produto a ser avaliado -->
        <button type="submit">Avaliar</button>
    </form>
</body>
</html>
