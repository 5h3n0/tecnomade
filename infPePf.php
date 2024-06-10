<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/default.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('navPf.php');
    ?>
    <br>
    <br>
    <br>
    <br>
    <ul>
        <a href="updatePf.php">
            <li>Alterar Senha</li>
        </a>
        <a href="deletePf.php">
            <li>Excluir conta</li>
        </a>
    </ul>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>