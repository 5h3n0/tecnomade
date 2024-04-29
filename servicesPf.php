<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("connect.php");

$errors = [];


if (!isset($_SESSION['id_Pf'])) {
    
    header("Location: login.php");

}


$id_Pf = $_SESSION['id_Pf'];


$sql = "SELECT id_Cat, nome FROM categorias WHERE id_Cat NOT IN (SELECT id_Cat FROM Cat_Sel WHERE id_Pf = $id_Pf)";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['categorias'])) {
       
        $categoriasSelecionadas = $_POST['categorias'];

        
        $categoriasSelecionadas = array_unique($categoriasSelecionadas);

        foreach ($categoriasSelecionadas as $categoria) {
            
            $sql = "INSERT INTO cat_sel (id_Pf, id_Cat) VALUES ($id_Pf, $categoria)";
            if (!$conn->query($sql)) {
                $errors[] = "Erro ao inserir categoria: " . $conn->error;
            }
        }

        if (empty($errors)) {

            header("Location: perfilPf.php");

        }
    } else {
        $errors[] = "Nenhuma categoria selecionada para inserir.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/categorias.css">
    
</head>

<body>
    <section class="containerDivInsert" style="margin:auto; margin-top:10%;">
        <main>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="categoriasForm">
                <!-- Adicione o campo id_Pf -->
                <input type="hidden" name="id_Pf" value="1"> <!-- Substitua pelo valor real do id_Pf, se necessário -->
                <button class='fecharCats' onclick='closeServicesContainer()'><svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40"
                class="btn_back_ini_esc-opcs " id="btn_back_ini_esc-opcsUsr">
                <path fill="rgb(0, 148, 128)"
                    d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
            </svg></button>
                <!-- Exibir checkboxes para as categorias -->
                <div id="catServiceRealiza">
                    <h1 class="titleForms">Escolha os serviços que você realiza:</h1>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="checkbox-item">';
                            echo '<input type="checkbox" name="categorias[]" value="' . $row["id_Cat"] . '">';
                            echo"$row[nome]";
                            echo '</div>';
                        }
                    } else {
                        echo "0 resultados";
                    }
                    ?>
                    <div id="selectedCategoriesList">
                        <h2 class="titleForms">Categorias selecionadas:</h2>
                        <ul>
                           
                        </ul>
                    </div>
                </div>
                <input type="submit" class="btn_end_env" name="enviou" value="Enviar">
            </form>
        </main>
    </section>
    
    <script>
var selectedCategoriesList = document.getElementById('selectedCategoriesList');
selectedCategoriesList.style.display = 'none'; // Oculta a lista de categorias selecionadas inicialmente

catServiceRealiza.addEventListener('change', function (event) {
    if (event.target.type === 'checkbox') {
        var checkboxItem = event.target.closest('.checkbox-item');

        if (event.target.checked) {
            checkboxItem.style.display = 'none'; // Esconde o checkbox
            var categoryName = checkboxItem.textContent.trim();
            var categoryId = checkboxItem.querySelector('input').value;

            // Cria um elemento <ul> se não existir
            if (!selectedCategoriesList.querySelector('ul')) {
                var ul = document.createElement('ul');
                selectedCategoriesList.appendChild(ul);
            }

            // Adiciona o item à lista de categorias selecionadas
            var listItem = document.createElement('li');
            listItem.textContent = categoryName;
            listItem.dataset.checkboxId = categoryId;
            selectedCategoriesList.querySelector('ul').appendChild(listItem);

            // Mostra a lista de categorias selecionadas
            selectedCategoriesList.style.display = 'block';
        } else {
            // Verifica se ainda há checkboxes selecionados
            var anyChecked = document.querySelector('.checkbox-item input[type="checkbox"]:checked');
            if (!anyChecked) {
                // Esconde a lista de categorias selecionadas se nenhum checkbox estiver selecionado
                selectedCategoriesList.style.display = 'none';
            }
        }
    }
});

// Adiciona um evento de clique aos itens da lista de categorias selecionadas
selectedCategoriesList.addEventListener('click', function(event) {
    if (event.target.tagName === 'LI') {
        var checkboxId = event.target.dataset.checkboxId;
        var checkboxItem = document.querySelector('.checkbox-item input[value="' + checkboxId + '"]');
        
        if (checkboxItem) {
            checkboxItem.checked = false;
            checkboxItem.closest('.checkbox-item').style.display = 'block'; // Mostra o checkbox
            event.target.remove(); // Remove o item clicado da lista de categorias selecionadas
            
            // Verifica se ainda há checkboxes selecionados
            var anyChecked = document.querySelector('.checkbox-item input[type="checkbox"]:checked');
            if (!anyChecked) {
                // Esconde a lista de categorias selecionadas se nenhum checkbox estiver selecionado
                selectedCategoriesList.style.display = 'none';
            }
        }
    }
});

    </script>
</body>

</html>
