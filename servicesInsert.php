<?php
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
</head>

<body>
    <?php if ($all_categories_filled) { ?>
        <div class="semServicos">
            <h1 class="top">Você já inseriu todos os serviços disponíveis.</h1>
        </div>
    <?php } else { ?>
        <section class="container py-5">
            <h1 class="top">Inserir Serviços</h1>
            <form class="formCadService" action="servicesInsertBd.php" method="POST">
                <div id="div_nome">
                    <label for="nome" class='lbl_nome_service lbl_service'>Nome do Serviço:</label>
                    <input type="text" class='inp_nome_service inp_service' name="nome" required>
                </div>
                <div id="div_desc">
                    <label for="desc" class='lbl_desc_service lbl_service'>Descrição do Serviço:</label>
                    <textarea class="lbl_desc_service textarea_desc inp_service" name="desc" required></textarea>
                </div>
                <div id="div_cat">

                    <label for="categoria" class="lbl_cat_service lbl_service lbl_service">Categoria:</label>

                    <select class="inp_cat_service select_cat  inp_service" name="categoria" required>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!in_array($row['id_Cat'], $services_categories)) {
                                echo "<option value='{$row['id_Cat']}'>{$row['nome']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>


                <input type="submit" class="btn_insert" value="Inserir Serviço">
                </form>
        </section>
    <?php } ?>

    <script src="./js/formatDin.js"></script>
</body>

</html>