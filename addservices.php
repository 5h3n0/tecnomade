<?php
include('connect.php'); 
session_start();
if(!isset($_SESSION['pfLogado'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Adicionar Serviço</title>
</head>
    <h1>Adicionar Serviço</h1>
    <form action="addServiceBd.php" method="post">
        <label for="nome">Nome do Serviço:</label>
        <input type="text" name="nome" id="nome" required><br><br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" required><br><br>
        <input type="submit" value="Adicionar Serviço">
    </form>
</body>
</html>