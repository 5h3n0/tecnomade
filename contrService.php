<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// Verifica se o ID do profissional foi recebido via POST
if(isset($_POST['profId'])) {
    // Conexão com o banco de dados (substitua pelas suas configurações)
    require_once 'connect.php';

    // Recupera o ID do profissional
    $profId = $_POST['profId'];

    // Consulta para obter os detalhes do serviço do profissional
    $sql = "SELECT * FROM services WHERE id_Pf = $profId";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Exibe os detalhes do serviço
        while ($row = $result->fetch_assoc()) {
            echo "<h2>Dados do Serviço</h2>";
            echo "<p>Nome do Serviço: " . $row['nomeService'] . "</p>";
            echo "<p>Descrição: " . $row['descService'] . "</p>";
            echo "<p>Preço: R$ " . $row['vlrService'] . "</p>";
            // Adicione aqui qualquer outro detalhe do serviço que deseja exibir
        }
    } else {
        echo "Nenhum serviço encontrado para este profissional.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do profissional não recebido.";
}
?>
