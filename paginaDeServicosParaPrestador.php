<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION)) {
    session_start();
}
include_once "connect.php";

$id_Pf = $_SESSION['id_Pf'];

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
<!DOCTYPE html>
<html lang="pt-br">
<?php
$sql_notification = "SELECT c.id_contratacao, s.nomeService, s.descService, c.valor, c.data_Contratacao, u.usrName AS nome_usuario, c.id_Usr, c.id_Service
 FROM contratacoes c 
 INNER JOIN services s ON c.id_Service = s.id_Service 
 INNER JOIN users u ON c.id_Usr = u.id_Usr
 WHERE c.id_Pf = $id_Pf
 AND NOT EXISTS (
     SELECT 1
     FROM servicos_realizados sr
     WHERE sr.id_contratacao = c.id_contratacao
 )";
$result_notification = $conn->query($sql_notification);
if ($result_notification->num_rows > 0) {
    $row_notification = $result->fetch_assoc();
    $_SESSION['nova_contratacao'] = true;
}

$sql_orcamento = "SELECT COUNT(*) AS count FROM solicitacoes_servico WHERE status = 'Pendente' AND id_Pf = $id_Pf";
$result_orcamento = $conn->query($sql_orcamento);

if ($result_orcamento) {
    $row_orcamento = $result_orcamento->fetch_assoc();
    $count_orcamento = $row_orcamento['count'];

    // Se houver uma nova solicitação de orçamento pendente, define a variável de sessão
    if ($count_orcamento > 0) {
        $_SESSION['novo_orcamento'] = true;
    }
}
?>

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
    <link rel="stylesheet" href="./css/paginasDeServicoPf.css">
    
</head>


<body>

    <?php

    include_once ("navPf.php");
    ?>

    <ul class="navServices">
        <li><a href="#" onclick="loadPage('servicesInsert.php')">Inserir Serviços</a></li>
        <li><a href="#" onclick="loadPage('servicosInseridos.php')">Meus serviços</a></li>
        <li><a href="#" onclick="loadPage('orcamento.php')">
                Orçamentos
                <?php if (isset($_SESSION['novo_orcamento']) && $_SESSION['novo_orcamento']) { ?>
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor'
                        class='bi bi-bell-fill' viewBox='0 0 16 16'>
                        <path
                            d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901' />
                    </svg>
                    <?php $_SESSION['novo_orcamento'] = false;
                } ?>
            </a>
        </li>

        <li>
            <a href="#" onclick="loadPage('novasContratacoes.php')">
                Novas contratações
                <?php if (isset($_SESSION['nova_contratacao']) && $_SESSION['nova_contratacao']) { ?>
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor'
                        class='bi bi-bell-fill' viewBox='0 0 16 16'>
                        <path
                            d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901' />
                    </svg>
                    <?php $_SESSION['nova_contratacao'] = false;
                } ?>
            </a>
        </li>
        <li><a href="#" onclick="loadPage('servicosRealizados.php')">Seviços Realizados</a></li>
    </ul>




    <div id="content">

    </div>
    <?php
    if (isset($_SESSION['servicoInserido']) && $_SESSION['servicoInserido']) {
        echo '<div class="opa">';
        echo '  <p>Serviço inserido com sucesso!</p>';
        echo '  <button class="closeButton" onclick="closeAlert()">Fechar</button>';
        echo '</div>';

        $_SESSION['servicoInserido'] = false;
    }
    ?>
    <script>
        // window.onload = function () {
        //     loadPage('servicesInsert.php');
        // };
        window.onload = function () {
            loadPage('servicosInseridos.php');
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
        // ---------------------------------------------------------------------------

        function closeAlert() {
            document.querySelector('.opa').style.display = 'none';
        }

    </script>

    <?php
    include_once "footer.php";
    ?>
    <script src="./js/formatDin.js"></script>

</body>

</html>