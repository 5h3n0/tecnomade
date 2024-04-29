<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./css/servicesInsert.css">
    <style>
        .customAlert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    z-index: 1000;
}

.closeBtn {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}

    </style>
</head>


<body>
<div id="customAlert" class="customAlert">
    <span class="closeBtn" onclick="closeAlert()">&times;</span>
    <p>Serviço inserido com sucesso!</p>
</div>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once "connect.php";
    
    $id_Pf = $_SESSION['id_Pf'];
    if(isset($_SESSION['servicoInserido']) && $_SESSION['servicoInserido']) {
        echo '<div class="customAlert">';
        echo '<span class="closeBtn" onclick="closeAlert()">&times;</span>';
        echo '<p>Serviço inserido com sucesso!</p>';
        echo '</div>';
        $_SESSION['servicoInserido'] = false;
    }
    // Consulta para obter as categorias disponíveis para o profissional
    $query = "SELECT categorias.id_Cat, categorias.nome 
            FROM categorias 
            INNER JOIN cat_sel ON categorias.id_Cat = cat_sel.id_Cat 
            WHERE cat_sel.id_Pf = $id_Pf";

$result = mysqli_query($conn, $query);

// Consulta para obter as categorias para as quais o profissional já inseriu serviços
$query_services = "SELECT DISTINCT id_Cat FROM services WHERE id_Pf = $id_Pf";
$result_services = mysqli_query($conn, $query_services);

$services_categories = array();
while ($row_services = mysqli_fetch_assoc($result_services)) {
        $services_categories[] = $row_services['id_Cat'];
    }
    
    // Verificar se todas as categorias já foram preenchidas
    $all_categories_filled = mysqli_num_rows($result) == count($services_categories);
    ?>

<ul>
    <li><a href="#" onclick="loadPage('servicesInsert.php')">Inserir Serviços</a></li>
    <li><a href="#" onclick="loadPage('servicosInseridos.php')">Meus serviços</a></li>
    <li><a href="#" onclick="loadPage('contato.php')">Novas contratações</a></li>
    <li><a href="#" onclick="loadPage('contato.php')">realizados</a></li>
</ul>
    


<div id="content">

</div>
    <script>
        function loadPage(page) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", page, true);
            xhttp.send();
        }
        // ---------------------------------------------------------------------------
        function closeAlert() {
    document.querySelector('.customAlert').style.display = 'none';
}

    </script>
    
    <?php
    include_once "footer.php";
    ?>
    <script src="./js/formatDin.js"></script>

</body>

</html>
