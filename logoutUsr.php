<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include("connect.php");
unset($_SESSION['usrLogado']);
header('location: lgcd.php');
?>