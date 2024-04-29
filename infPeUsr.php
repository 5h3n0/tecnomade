<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <a href="updateUsr.php">
            <li>Alterar Senha</li>
        </a>
        <a href="deleteUsr.php">
            <li>Excluir conta</li>
        </a>
        <a href="perfilUsr.php">
            <li>Excluir conta</li>
        </a>
    </ul>
</body>

</html>