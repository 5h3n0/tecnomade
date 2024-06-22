<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include("connect.php");
unset($_SESSION['pfLogado']);

header('location: lgcd.php');
?>