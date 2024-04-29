<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (isset($_POST['profId'])) {
    $_SESSION['profId'] = $_POST['profId'];
    echo "ID do profissional definido na sessão PHP com sucesso";
} else {
    echo "ID do profissional não recebido";
}
?>