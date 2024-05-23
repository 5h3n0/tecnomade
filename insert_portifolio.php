<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$id_Pf = $_SESSION['id_Pf'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Projeto</title>

</head>
<body>
    <form action="portifolioBd.php" method="post" enctype="multipart/form-data">
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Descrição:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="date">Data:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <!-- Campos de upload de imagem -->
        <div id="image_fields">
            <div>
                <label for="image1">Imagem 1:</label><br>
                <input type="file" id="image1" name="image1" required><br><br>
            </div>
            <div>
                <label for="image2">Imagem 2:</label><br>
                <input type="file" id="image2" name="image2"><br><br>
            </div>
        </div>
<input type="hidden" value='<?php echo $id_Pf ?>' name="id_Pf">
        <!-- Botão "Adicionar Mais" -->
        <button type="button" id="add_more">Adicionar Mais</button><br><br>

        <!-- Script para adicionar mais campos de upload de imagem -->
        <script>
            var imageCount = 2; // Começa com 2 porque já existem 2 campos iniciais
            document.getElementById('add_more').addEventListener('click', function() {
                if (imageCount < 10) {
                    imageCount++;
                    var newImageField = document.createElement('div');
                    newImageField.innerHTML = '<label for="image' + imageCount + '">Imagem ' + imageCount + ':</label><br>' +
                                              '<input type="file" id="image' + imageCount + '" name="image' + imageCount + '"><br><br>';
                    document.getElementById('image_fields').appendChild(newImageField);
                } else {
                    alert('Você atingiu o limite máximo de imagens (10).');
                }
            });
        </script>

        <input type="submit" value="Adicionar Projeto">
    </form>
</body>
</html>
