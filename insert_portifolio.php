<?php
if (!isset($_SESSION)) {
    session_start();
}
$id_Pf = $_SESSION['id_Pf'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Projeto</title>
    <link rel="stylesheet" href="./css/insert_portifolio.css">
</head>

<body>
    <div class="insert_portifolio">
        <form action="portifolioBd.php" method="post" enctype="multipart/form-data">
            <label for="title" class="lbl_insert_portifolio">Título</label>
            <input type="text" class="inp_insert_potifolio" id="title" name="title" required>

            <label for="description" class="lbl_insert_portifolio">Descrição</label>
            <div class="cont_descPortifolio_textarea">
                <textarea id="description" name="description" required></textarea>
            </div>

            <label for="date" id="" class="lbl_insert_portifolio">Data</label>
            <input type="date" id="date" name="date" required>
            <!-- Campos de upload de imagem -->
            <div class="inserir_imgs">
                <div id="image_fields">
                    <div>
                        <label for="image1" class="lbl_insert_portifolio">Imagem 1</label>
                        <input type="file" id="image1" name="image1" required>
                    </div>
                    <div>
                        <label for="image2" class="lbl_insert_portifolio">Imagem 2</label>
                        <input type="file" id="image2" name="image2">
                    </div>
                </div>
                <input type="hidden" value='<?php echo $id_Pf ?>' name="id_Pf">
                <!-- Botão "Adicionar Mais" -->
                <div class="btn_add">

                    <button type="button" id="add_more"><i><svg height="32px" id="Layer_1"
                                style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path
                                    d="M28,14H18V4c0-1.104-0.896-2-2-2s-2,0.896-2,2v10H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h10v10c0,1.104,0.896,2,2,2  s2-0.896,2-2V18h10c1.104,0,2-0.896,2-2S29.104,14,28,14z" />
                            </svg></i></button><br>
                </div>
            </div>
            <!-- Script para adicionar mais campos de upload de imagem -->
            <script>
                var imageCount = 2; // Começa com 2 porque já existem 2 campos iniciais
                document.getElementById('add_more').addEventListener('click', function () {
                    if (imageCount < 10) {
                        imageCount++;
                        var newImageField = document.createElement('div');
                        newImageField.innerHTML = '<label class="lbl_insert_portifolio" for="image' + imageCount + '">Imagem ' + imageCount + ':</label>' +
                            '<input type="file" id="image' + imageCount + '" name="image' + imageCount + '">';
                        document.getElementById('image_fields').appendChild(newImageField);
                    } else {
                        alert('Você atingiu o limite máximo de imagens (10).');
                    }
                });
            </script>
            <input class="btn_enviar" type="submit" value="Adicionar Projeto">
        </form>
    </div>
</body>

</html>