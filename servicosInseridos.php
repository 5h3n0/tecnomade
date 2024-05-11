<div class="servicos">

<?php
    if (!isset($_SESSION)) { 
        session_start(); 
    } 
    include_once "connect.php";
    $id_Pf = $_SESSION['id_Pf'];
    // Consulta para obter os serviços e suas categorias associadas
    $sql = "SELECT s.*, c.nome AS nomeCategoria FROM services s
            INNER JOIN categorias c ON s.id_Cat = c.id_Cat
            WHERE s.id_Pf = ? ORDER BY RAND()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há serviços associados ao id_Pf
    if ($result->num_rows > 0) {
        // Exibe os serviços e suas categorias
        while ($row = $result->fetch_assoc()) {
            echo "<div class='servico'>";
            echo"<label class='lbl_servico_inserido'>Serviço</label>";
            echo "<p class='dados_service' id='nome_service'> " . $row['nomeService'] . "</p>";
            echo"<label class='lbl_servico_inserido'>Descrição do Serviço </label>";
            echo "<p class='dados_service' id='desc_service'>" . $row['descService'] . "</p>";
            echo"<label class='lbl_servico_inserido'>Categoria</label>";
            echo "<p class='dados_service' id='cat_service'>" . $row['nomeCategoria'] . "</p>";
            echo "<form action='deleteService.php' method='post'>";
            echo "<input type='hidden' name='id_service' value='" . $row['id_Service'] . "'>";
            echo "<button type='submit' class='delete-btn'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
    echo"<div class='semServicos'>";

        echo "<p class='top'>Nenhum serviço encontrado para este usuário.</p>";
    echo"</div>";

    }
?>
</div>
