<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include("connect.php");
session_unset();
session_destroy();
header('location: index.php');

mysqli_close($conn);
exit();
?>