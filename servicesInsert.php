<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="./css/servicesInsert.css">
    


    </head>
<body>
    
<?php

    if(!isset($_SESSION)) 
    { 
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

<?php if ($all_categories_filled) { ?>
    <div class="semServicos">
        <h1 class="top">Você já inseriu todos os serviços disponíveis.</h1>
    </div>
    <?php } else { ?>
        <section class="container py-5">
            <h1 class="top">Inserir Serviços</h1>

            <form class="cadService" action="servicesInsertBd.php" method="POST">
                <label for="nome">Nome do Serviço:</label><br>
                <input type="text" id="nome" name="nome" required><br><br>

                <label for="desc">Descrição:</label><br>
                <textarea id="desc" name="desc" required></textarea><br><br>

                <label for="preco">Preço:</label><br>
                <input type="text" id="preco" class="dinheiro" name="preco" oninput="this.value = formatDin(this.value)" required><br><br>


                <label for="categoria">Categoria:</label><br>
                <select id="categoria" name="categoria" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!in_array($row['id_Cat'], $services_categories)) {
                            echo "<option value='{$row['id_Cat']}'>{$row['nome']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <input type="submit" value="Inserir Serviço">
            </form>
        <?php } ?>
    </section>
    
    <script src="./js/formatDin.js"></script>

</body>
 <!-- <label>Escolha o tipo de preço:</label><br>
                <input type="radio" id="por_hora" name="tipo_preco" value="por_hora" checked>
                <label for="por_hora">Por hora</label><br>
                <input type="radio" id="valor_unico" name="tipo_preco" value="valor_unico">
                <label for="valor_unico">Valor único</label><br><br>

                <label for="preco">Preço:</label><br>
                <input type="number" id="preco" name="preco" min="0" step="0.01" required><br><br>
                -->

</html>