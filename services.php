<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <style>
        .services {
            margin: 80px 15px 0 15px;
        }

        .services h1 {
            text-align: center;
        }

        .service {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }

        .service img {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .service h3 {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="services">
        <h1>Serviços Disponíveis</h1>

        <label for="filtro">Filtrar:</label>
        <input type="text" id="filtro" name="filtro">

        <select id="filtroTipo" onchange="filtrarServicos()">
            <option value="">Todos</option>
            <option value="categoria">Categoria</option>
            <option value="profissional">Profissional</option>
            <option value="nomeDeServico">Serviço</option>
        </select>

        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if(!isset($_SESSION['usrLogado'])){
            header("Location:lgcd.php");
        }

        require_once 'connect.php';
        include_once 'navUsr.php';

        // Consulta SQL para buscar todos os serviços
        $sql = "SELECT services.*, prof.pfName, prof.imgName, categorias.nome AS catName
                FROM services
                INNER JOIN prof ON services.id_Pf = prof.id_Pf
                INNER JOIN categorias ON services.id_Cat = categorias.id_Cat ORDER BY RAND()";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $valor = $row['vlrService'];
                $valor = substr($valor, 0, -2);
                $valor = number_format($valor, 2, ',', '.');
                echo "<div class='service' data-nome='{$row['nomeService']}' data-valor='{$valor}' data-categoria='{$row['catName']}'>";
                echo "<h3>{$row['nomeService']}</h3>";
                echo "<p>{$row['descService']}</p>";
                echo "<p>Preço: R$ {$valor}</p>";
                echo "<p>Profissional: {$row['pfName']}</p>";
                echo "<h4>Categoria de serviço: {$row['catName']}</h4>";
                if ($imgData = $row['imgName']) {
                    $imgPf = 'upload/' . $row['imgName'];
                }

                echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
                echo "<form action='contratService.php' method='post'>";
                echo "<input type='hidden' name='id_servico' value='{$row['id_Service']}'>";
                echo "<input type='hidden' name='id_Pf' value='{$row['id_Pf']}'>";
                echo "<button type='submit'>Contratar Serviço</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "Nenhum serviço disponível no momento.";
        }
        ?>
    </div>

    <script>
        document.getElementById("filtro").addEventListener("input", function() {
            filtrarServicos();
        });

        function filtrarServicos() {
            var filtro = document.getElementById("filtro").value.toUpperCase();
            var tipoFiltro = document.getElementById("filtroTipo").value;
            var servicos = document.querySelectorAll('.service');

            for (var i = 0; i < servicos.length; i++) {
                var servico = servicos[i];
                var nome = servico.getAttribute('data-nome').toUpperCase();
                var profissional = servico.querySelector('p:nth-child(4)').textContent.toUpperCase();
                var valor = parseFloat(servico.getAttribute('data-valor'));
                var categoria = servico.getAttribute('data-categoria').toUpperCase();

                switch (tipoFiltro) {
                    case "categoria":
                        if (categoria.includes(filtro)) {
                            servico.style.display = "block";
                        } else {
                            servico.style.display = "none";
                        }
                        break;
                    case "profissional":
                        if (profissional.includes(filtro)) {
                            servico.style.display = "block";
                        } else {
                            servico.style.display = "none";
                        }
                        break;
                    case "nomeDeServico":
                        if (nome.includes(filtro)) {
                            servico.style.display = "block";
                        } else {
                            servico.style.display = "none";
                        }
                        break;

                    default:
                        servico.style.display = "block";
                }
            }
        }
    </script>

</body>

</html>
