<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// Obtenha o ID do profissional clicado
$id_Pf = $_POST['id'];

// Defina a variável de sessão com o ID do profissional
$_SESSION['id_Pf_paraUsr'] = $id_Pf;
require_once 'connect.php';

// Verificar se o ID do profissional foi enviado via POST
if(isset($_POST['id'])) {
    $professionalId = $_POST['id'];

    // Consulta SQL para obter as informações do profissional e suas especialidades
    $sql = "SELECT prof.*, categorias.nome AS categoria_nome
            FROM prof
            INNER JOIN cat_sel ON prof.id_Pf = cat_sel.id_Pf
            INNER JOIN categorias ON cat_sel.id_Cat = categorias.id_Cat
            WHERE prof.id_Pf = $professionalId";

    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Array para armazenar as especialidades do profissional
        $categories = array();
        $row = $result->fetch_assoc();
        $imgPf= $row['imgName'];
        $name = $row['pfName'];
        $description = $row['descPf'];

        // Loop através dos resultados e adicionar as especialidades ao array
        do {
            $categories[] = $row['categoria_nome'];
        } while ($row = $result->fetch_assoc());

        // Enviar os dados de resposta como um array associativo
        $response = array(
            'imgName' => $imgPf,
            'name' => $name,
            'description' => $description,
            'categories' => $categories
        );

        // Convertendo o array em JSON e enviando de volta como resposta AJAX
        echo json_encode($response);
    } else {
        // Se não houver resultados, retornar uma resposta vazia
        echo json_encode(array());
    }
} else {
    // Se o ID do profissional não foi enviado, retornar uma resposta vazia
    echo json_encode(array());
}
?>
