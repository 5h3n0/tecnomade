    <?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Contratados</title>
    <!-- Adicione links para CSS ou Bootstrap aqui, se necessário -->
    <style>
        .content {
            height: 100%;
            width: 100%;
        }

        .navServices {
            margin-top: 5%;
            font-size: 32px;
            display: flex;
            justify-content: space-around;
        }

        .navServices li {
            font-size: 30px;
            list-style: none;
        }

        .opa {
            background-color: #38a4ac;
            color: black;
            padding: 20px;
            border: 5px solid rgb(19, 74, 71);
            border-radius: 5px;
            font-size: 22px;
            font-weight: bold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30%;
            height: 10%;
            text-align: center;
            display
        }

        .closeButton {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #155724;
            font-weight: bold;
        }

        .closeButton:hover {
            scale: 1.2;
            text-decoration: underline;
            transition: 0.3s;
        }

        .semServicos {
            height: 900px !important;
            width: 100vh;
            align-items: center;

            margin: auto;
        }
        .semServicos h1 {
           position: relative;
           top: 45%;
           left: 50%;
           transform: translate(-50%, 0);
        }
    </style>
</head>

<body>
    <?php
    include_once("connect.php");
    include_once("navUsr.php");
    ?>
    <h1>Serviços Contratados</h1>
    <ul class="navServices">
        <li><a href="#" onclick="loadPage('servicosEmAndamento.php')">Servicos em Andamento</a></li>
        <li><a href="#" onclick="loadPage('servicosRealizadosUsr.php')">Serviços realizados</a></li>
        <li><a href="#" onclick="loadPage('verOrcamentosUsr.php')">Orçamentos</a></li>
    </ul>


        <?php //if (isset($_SESSION['nova_contratacao']) && $_SESSION['nova_contratacao']) { ?>
        <!-- <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-bell-fill' viewBox='0 0 16 16'>
                    <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901'/>
                </svg> -->
        <?php // } ?>

        

        <div id="content">

        </div>
        <script>
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