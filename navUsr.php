<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/style_home.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
  .imgNav{
      width:50px;
      height: 50px;
      border-radius: 50%;
      object-fit:  cover;
      padding: 0;
      margin-top: -5px;
    }
</style>
</head>
<div class="header cleafix">
  <div class="container_nav">

    <a class="backhome" href="homeUsr.php">
      <img src="./imgs/img_logo_white_and_black.png" class="logo" />
      <h1 class="title_nav">TecnoMade</h1>
    </a>
    <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
    
    <ul class="nav">
      <li><a href="homeUsr.php" class="nav-links">Home</a></li>
      <li><a href="services.php" class="nav-links">Serviços</a></li>
      <li><a href="prof.php" class="nav-links">Profissionais</a></li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
           $sql = "SELECT * FROM users WHERE id_Usr = $_SESSION[id_Usr]";
           $result = $conn->query($sql);

           if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();

              
             
                  
               if(!empty($row['imgName'])){
                $imgUsr = 'upload/' . $row['imgName'];
                echo"<img src='$imgUsr' class='imgNav' alt='Imagem do Profissional'>";
               }

                   
           }
          ?>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="perfilUsr.php">Perfil</a></li>
        <li><a class="dropdown-item" href="infPeUsr.php">Informações Pessoais</a></li>
        <li><a href="#" class=" dropdown-item">Contato</a></li>
        <li><a href="#" class="dropdown-item">Sobre Nós</a></li>
          <li><a class="dropdown-item" href="logout.php">Log out</a></li>
        </ul>
      </li>

      </li>
    </ul>
  </div>
</div>