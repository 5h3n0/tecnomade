<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['pfLogado'])) {
    header('Location: lgcd.php');
    exit();
}

require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Bancários</title>
</head>
<body>

<a href="#" onclick="loadPage('insert_dados_bank.php')">Inserir dados</a>
<a href="#" onclick="loadPage('update_dados_bank.php')">Alterar dados</a>

<div id="content"></div>

<script>
    window.onload = function () {
        loadPage('insert_dados_bank.php');
    };

    function loadPage(page) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }
</script>

</body>
</html>
