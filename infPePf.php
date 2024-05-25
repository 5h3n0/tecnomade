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
    <title>Document</title>
</head>

<body>
    <ul>
        <a href="updatePf.php">
            <li>Alterar Senha</li>
        </a>
        <a href="deletePf.php">
            <li>Excluir conta</li>
        </a>
    </ul>
</body>

</html>