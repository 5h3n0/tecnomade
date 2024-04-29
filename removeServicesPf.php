<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once ("connect.php");

$id_Pf = $categoriasSelecionadas = null;
$errors = [];

// Reabrindo a conexão com o banco de dados


// Verificando se houve erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificando se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificando se as categorias foram selecionadas
    if (isset($_POST['categorias'])) {
        $id_Pf = $_SESSION['id_Pf'];
        $categoriasSelecionadas = $_POST['categorias'];

        // Removendo as categorias selecionadas pelo usuário
        foreach ($categoriasSelecionadas as $id_Cat) {
            $sql = "DELETE FROM cat_sel WHERE id_Pf = $id_Pf AND id_Cat = $id_Cat";
            if (!$conn->query($sql)) {
                $errors[] = "Erro ao remover categoria: " . $conn->error;
            }
        }

        // Redirecionando para o perfil do usuário após a remoção
        if (empty($errors)) {
            header("Location: perfilPf.php");
            exit();
        }
    } else {
        $errors[] = "Nenhuma categoria selecionada para remoção.";
    }
}

// Consulta para obter as categorias selecionadas pelo usuário
$id_Pf = $_SESSION['id_Pf'];
$sql = "SELECT cat_sel.id_Cat, categorias.nome 
        FROM cat_sel 
        INNER JOIN categorias ON cat_sel.id_Cat = categorias.id_Cat 
        WHERE cat_sel.id_Pf = $id_Pf";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Remover Categorias</title>
    <link rel="stylesheet" href="./css/categorias.css">

    <style>
    .containerDivRemove {
        position: absolute;
        top: 50%;
        left: 50%;  
        transform: translate(-50%, -50%);
    }
    .fecharCats{
        width: 50px;
    }
    </style>
</head>

<body>
    <div class="containerDivRemove">
        <button class='fecharCats' onclick='closeRemoveServicesForm()'><svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40"
                class="btn_back_ini_esc-opcs " id="btn_back_ini_esc-opcsUsr">
                <path fill="rgb(0, 148, 128)"
                    d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
            </svg></button>
        <h2 class="titleForms">Remover Categorias</h2>
        <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
            <p>
                <?php echo $error; ?>
            </p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div>
            <input  type="checkbox" id="categoria_<?php echo $row['id_Cat']; ?>" class="checkboxRemove" name="categorias[]" value="<?php echo $row['id_Cat']; ?>">
                <label for="categoria_<?php echo $row['id_Cat']; ?>" class="checkbox-item checkbox-item_remove" onclick="toggleCheckbox('<?php echo $row['id_Cat']; ?>')">
                <?php echo $row['nome']; ?>
            </label>
            </div>
            <?php endwhile; ?>
            <input type="submit" class="btn_end_env btn_remover" value="Remover Categorias Selecionadas">
        </form>
    </div>
</body>
<script>
  function toggleCheckbox(id) {
    var checkbox = document.querySelector('#categoria_' + id);
    if (checkbox) {
        checkbox.checked = !checkbox.checked;
    }
}
</script>

</html>