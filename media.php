<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$id_Pf = $_SESSION['id_Pf'];
require 'connect.php';
echo"
<a href='avaliar.php'>avaliar</a>
<a href='media.php'> media</a>
<br>
<br>
";


$sql = "SELECT AVG(estrelas) as average FROM avaliacoes WHERE id_Pf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_Pf);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$average = round($row['average'], 1);

$stmt->close();
$conn->close();

echo "A média de avaliações para este produto é: " . $average;
?>
