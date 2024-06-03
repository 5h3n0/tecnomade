<?php
if (!isset($_SESSION)) {
    session_start();
    
}
if (isset($_SESSION['notification'])) {
    header("Location: avaliar.php");
  
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Contratados</title>
    <link rel="stylesheet" href="./css/paginasDeServicoUsr.css">

</head>












<body>
    <?php
    include_once ("connect.php");
    include_once ("navUsr.php");
    ?>
    <ul class="navServices">
        <li><a href="#" onclick="loadPage('verOrcamentosUsr.php')">Orçamentos 
        <?php if (isset($_SESSION['orcamentoDado']) && $_SESSION['orcamentoDado']) { ?>
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor'
                        class='bi bi-bell-fill' viewBox='0 0 16 16'>
                        <path
                            d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901' />
                    </svg>
                    <?php $_SESSION['orcamentoDado'] = false;
                } ?>
    </a></li>
        <li><a href="#" onclick="loadPage('servicosEmAndamento.php')">Servicos em Andamento</a></li>
        <li><a href="#" onclick="loadPage('servicosRealizadosUsr.php')">Serviços realizados 
    
    </a></li>
    </ul>


    <?php //if (isset($_SESSION['nova_contratacao']) && $_SESSION['nova_contratacao']) { ?>
    <!-- <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-bell-fill' viewBox='0 0 16 16'>
                    <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901'/>
                </svg> -->
    <?php // } ?>



    <div id="content">

    </div>
    <script>

        // window.onload = function () {
        //     loadPage('servicosEmAndamento.php');
        // };
        //  window.onload = function () {
        //      loadPage('verOrcamentosUsr.php');
        //  };
         window.onload = function () {
             loadPage('servicosRealizadosUsr.php');
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
</body>

</html>