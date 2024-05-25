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
  <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
  
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

      <li class="nav-item dropdown_nav">
        <a class="nav-img">
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
        <ul class="dropdown_menu" style="display: none;">
        <li><a class="dropdown-element nav-links" href="perfilPf.php">Perfil</a></li>
        <li><a class="dropdown-element nav-links" href="portifolio.php">Portifolio</a></li>
        <li><a class="dropdown-element nav-links" href="infPePf.php">Informações Pessoais</a></li>
        <li><a href="#" class="dropdown-element nav-links">Configurações</a></li>
        <li><a class="dropdown-element nav-links" href="logout.php">Log out</a></li>
        </ul>
      </li>

      </li>
    </ul>
  </div>
</div>

    <script>

  document.addEventListener('DOMContentLoaded', function() {
    const img_perfil = document.querySelector('.imgPf');
    const dropdownMenu = document.querySelector('.dropdown_menu');

    img_perfil.addEventListener('click', () => {
      if (dropdownMenu.style.display === 'none') {
        dropdownMenu.style.display = 'block';
        setTimeout(close_menu_bar, 5000);
      } else {
        dropdownMenu.style.display = 'none';
      };
    });

    function close_menu_bar() {
      dropdownMenu.style.display = 'none';
    }

    document.body.addEventListener('click', function(event) {
      const targetElement = event.target;

      if (targetElement !== img_perfil && !dropdownMenu.contains(targetElement)) {
       dropdownMenu.style.display = 'none';
        }
    });
  });
</script>


       
