<?php
$serverName = "localhost";
$userName = "root";
$serverPass = "";
$dbName = "tecnomadedb";

$conn = new mysqli($serverName, $userName, $serverPass, $dbName);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

