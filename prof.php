<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/prof.css">
</head>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['usrLogado']) {
    require_once 'navHome.php';
}
if ($_SESSION['usrLogado']) {
    require_once 'navUsr.php';
}
require_once 'connect.php';



$sql = "SELECT * FROM prof ORDER BY RAND()";
$result = $conn->query($sql);

$profissionals = array();
while ($row = $result->fetch_assoc()) {
    $profissionals[] = $row;
}

?>



<section class="container">
    <div class="row profissionals">
        <?php foreach ($profissionals as $professional): ?>
            <?php
            $serviceCountQuery = "SELECT COUNT(*) AS service_count FROM services WHERE id_Pf = ?";
            $serviceCountStmt = $conn->prepare($serviceCountQuery);
            $serviceCountStmt->bind_param('i', $professional['id_Pf']);
            $serviceCountStmt->execute();
            $serviceCountResult = $serviceCountStmt->get_result();
            $serviceCountRow = $serviceCountResult->fetch_assoc();

            // Verificar se o profissional possui pelo menos um serviço
            if (empty($serviceCountRow['service_count']) || $serviceCountRow['service_count'] == 0) {
                // Se não houver serviços, defina $imgPf como a imagem do profissional e continue para o próximo profissional
                $imgPf = 'upload/' . $professional['imgName'];
                continue;
            }


            ?>
            <div class="col-md-4 professional" data-id="<?= $professional['id_Pf'] ?>">

                <img src='<?php echo "upload/" . $professional['imgName'] ?>' alt="Imagem do Profissional"><br><br>
                <h3>
                    <?= $professional['pfName'] ?>
                </h3>
                <p>Especialidades:</p>
                <ul>
                    <?php
                    $catSql = "SELECT categorias.nome
                       FROM cat_sel
                       INNER JOIN categorias ON cat_sel.id_Cat = categorias.id_Cat
                       WHERE cat_sel.id_Pf = {$professional['id_Pf']}
                       LIMIT 3";
                    $catResult = $conn->query($catSql);

                    $counter = 0;

                    while ($catRow = $catResult->fetch_assoc()) {
                        echo "<li>{$catRow['nome']}</li>";
                        $counter++;
                    }


                    if ($counter > 2) {
                        echo "<p style='margin:0;'>...</p>";
                    }
                    ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="profDetails">
    <div class="details">
        <button class="closeBtn">X</button><br>
        <img src="" alt="Imagem do Profissional" id="profImage"><br><br>
        <h3 id="profName"></h3>
        <p id="profCat"></p>
        <h3 id="">Descrição</h3>
        <p id="profDescription"></p>
        <?php
        echo "<form action='viewPerfilPfForUsr.php' method='post'>";
        echo "<input type='button' name='verPerfil' value='Ver Perfil' onclick='redirectToNewPage()'>";
        echo "</form>";
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        $('.professional').click(function () {
            console.log("Cliquei em um profissional");
            var id = $(this).data('id');
            console.log("ID do profissional:", id);
            var $profDetails = $('.profDetails');

            // Enviar uma requisição AJAX para recuperar as especialidades e a imagem do profissional com base no ID
            $.ajax({
                url: 'pfFloat.php', // Altere para o arquivo que irá buscar as especialidades e a imagem
                method: 'POST',
                data: { id: id },
                success: function (response) {
                    console.log("Resposta do servidor:", response);
                    var data = JSON.parse(response);

                    // Exibir a imagem do profissional na caixa flutuante
                    $profDetails.find('#profImage').attr('src', 'upload/' + data.imgName);



                    // Exibir as especialidades do profissional na caixa flutuante
                    var categoriesList = '';
                    data.categories.forEach(function (category) {
                        categoriesList += '<li>' + category + '</li>';
                    });
                    $profDetails.find('#profCat').html('<strong>Especialidades:</strong> <ul>' + categoriesList + '</ul>');
                    $profDetails.find('#profName').text(data.name);

                    // Exibir a descrição do profissional na caixa flutuante
                    $profDetails.find('#profDescription').text(data.description);

                    // Posicionar a caixa flutuante ao lado do perfil clicado
                    var profileOffset = $('.professional[data-id="' + id + '"]').offset();
                    var profileWidth = $('.professional[data-id="' + id + '"]').outerWidth();
                    var profDetailsWidth = $profDetails.outerWidth();

                    var leftPosition = profileOffset.left + profileWidth + 10; // Adiciona um espaço de 10px entre o perfil e a caixa flutuante
                    var topPosition = profileOffset.top;

                    $profDetails.css({
                        display: 'block' // Mostra a caixa flutuante
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Erro ao fazer a requisição AJAX:", error);
                }
            });
        });

        // Fechar a caixa flutuante ao clicar no botão Fechar
        $('.closeBtn').click(function () {
            $('.profDetails').fadeOut();
        });
    });
    function redirectToNewPage() {
        window.location.href = 'viewPerfilPfForUsr.php';
    }
</script>

</html>