<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connect.php';
$id_Usr = $_SESSION['id_Usr'];
$sql = "SELECT id_Usr FROM users WHERE id_Usr='$id_Usr'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " Nome: " . $row["id_Usr"] . "<br>" . " - Email: " . $row["email"] . "<br><br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>