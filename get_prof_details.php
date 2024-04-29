<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM prof WHERE id_Pf = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $professional = $result->fetch_assoc();
    $stmt->close();
    
    if ($professional) {
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'img' => 'data:image/jpeg;base64,' . base64_encode($professional['imgData']),
                'name' => $professional['pfName'],
                'cat' => $professional['categorias'],
            )
        );
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Profissional não encontrado'));
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Solicitação inválida'));
}
?>