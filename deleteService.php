<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_service'])) {
    // Inclua o arquivo de conexão com o banco de dados
    require_once "connect.php";

    // Pegue o ID do serviço a ser excluído do formulário
    $id_service = $_POST['id_service'];

    // Consulta SQL para excluir o serviço com base no ID
    $sql = "DELETE FROM services WHERE id_Service = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_service);

    // Execute a consulta preparada
    if ($stmt->execute()) {
        // Serviço excluído com sucesso, redirecione de volta para a página de serviços
        header("Location: paginaDeServicosParaPrestador.php");
        exit();
    } else {
        // Se houver um erro ao excluir o serviço, exiba uma mensagem de erro
        echo "Erro ao excluir o serviço: " . $stmt->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    // Se o método de solicitação não for POST ou o ID do serviço não estiver definido, redirecione de volta para a página de serviços
    header("Location: paginaDeServicosParaPrestador.php");
    exit();
}
?>
