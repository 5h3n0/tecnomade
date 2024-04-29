<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <style>
        .services{
            margin: 80px 15px 0 15px;
        }
        .services h1{
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
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }

        require_once 'connect.php';
        include_once 'navUsr.php';

        $sql = "SELECT services.*, prof.pfName, prof.imgName, categorias.nome AS catName
    FROM services
    INNER JOIN prof ON services.id_Pf = prof.id_Pf
    INNER JOIN categorias ON services.id_Cat = categorias.id_Cat";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='service'>";
                echo "<h3>{$row['nomeService']}</h3>";
                echo "<p>{$row['descService']}</p>";
                echo "<p>Preço: R$ {$row['vlrService']}</p>";
                echo "<p>Profissional: {$row['pfName']}</p>";
                echo "<h4>Categoria de serviço: {$row['catName']}</h4>";
                echo "<p>ID da Categoria: {$row['id_Cat']}</p>";
                if($imgData = $row['imgName']){
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
</body>

</html>


<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    Adicionando o CSS do Bootstrap -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" -->
<!-- integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
<!-- <style>
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
</head> -->

<!-- <body>
    <div class="container">
        <h1 class="mt-5">Serviços Disponíveis</h1>
        <div class="row">
            <?php
            // session_start();
            // require_once 'connect.php';
            
            // $sql = "SELECT services.*, prof.pfName, prof.imgData, categorias.nome AS catName
            // FROM services
            // INNER JOIN prof ON services.id_Pf = prof.id_Pf
            // INNER JOIN categorias ON services.id_Cat = categorias.id_Cat";
            // $result = $conn->query($sql);
            // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //         echo "<div class='col-md-4'>";
            //         echo "<div class='service'>";
            //         echo "<form action='contratService.php' method='post'>";
            //         echo "<h3>{$row['nomeService']}</h3>";
            //         echo "<p>{$row['descService']}</p>";
            //         echo "<p>Preço: R$ {$row['vlrService']}</p>";
            //         echo "<p>Profissional: {$row['pfName']}</p>";
            //         echo "<h4>Categoria de serviço: {$row['catName']}</h4>";
            //         $imgData = $row['imgData'];
            //         $imgBase64 = base64_encode($imgData);
            //         echo "<img src='data:image/jpeg;base64,$imgBase64' alt='Imagem do Profissional' class='imgPf'><br><br>";
            //         echo "<input type='hidden' name='id_servico' value='{$row['id_Service']}'>";
            //         echo "<button type='submit' class='btn btn-primary'>Contratar Serviço</button>";
            //         echo "</form>";
            //         echo "</div>";
            //         echo "</div>";
            //     }
            // } else {
            //     echo "<div class='col'><p>Nenhum serviço disponível no momento.</p></div>";
            // }
            ?>
        </div>
    </div>
</body> -->

<!-- </html> -->