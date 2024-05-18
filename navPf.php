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
  <link rel="stylesheet" href="./css/style_nav.css">
  
  <style>
    .nav-img img{
      width:50px;
      height: 50px;
      border-radius: 50%;
      margin-top: -5px;
    }
  </style>
</head>
<div class="header cleafix">
  <div class="container_nav">

  <a class="backhome" href="index.php">
			<img src="./imgs/icon_logo_nav_bar.png" class="logo" />
		</a>
    <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
    <ul class="nav">
      <li><a href="homePf.php" class="nav-links">Home</a></li>
      <li><a href="paginaDeServicosParaPrestador.php" class="nav-links">Services</a></li>
      <li><a href="#" class="nav-links">Contact</a></li>
      <li><a href="sobre.php" class="nav-links">About</a></li>

      <li class="nav-item dropdown">
        <a class="nav-img dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
          $sql = "SELECT * FROM prof WHERE id_Pf = $_SESSION[id_Pf]";
          $result = $conn->query($sql);

          
           if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (empty($row['imgName'])) {
            echo "<img src='imgs/user.png' alt='Imagem do Profissional' class='imgPf'><br><br>";
            }
            if (!empty($row['imgName'])) {
              $imgPf = "upload/".$row['imgName'];
              echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'><br><br>";
            }
          }
          ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="perfilPf.php">Perfil</a></li>
          <li><a class="dropdown-item" href="logout.php">Log out</a></li>
        </ul>
      </li>

      </li>
    </ul>
  </div>
</div>