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
  <link rel="stylesheet" href="./css/style_nav.css">
  <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">

 

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
    <a class="backhome" href="index.php">
			<img src="./imgs/icon_logo_nav_bar.png" class="logo" />
		</a>
    <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
    
    <ul class="nav">
      <li><a href="homeUsr.php" class="nav-links">Home</a></li>
      <li><a href="services.php" class="nav-links">Serviços</a></li>
      <li><a href="prof.php" class="nav-links">Profissionais</a></li>
      <li><a href="#" class="nav-links">Contact</a></li>
			<li><a href="sobre.php" class="nav-links">About</a></li>
      
      <li class="nav-item" id="div_img">
        <a class="nav-link " role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <ul class="dropdown_menu" style="display: none;">
          <li><a class="dropdown-element nav-links" href="perfilUsr.php">Perfil</a></li>
          <li><a class="dropdown-element nav-links" href="paginaDeServicosParaUsr.php">Minha Contrações</a></li>
          <li><a class="dropdown-element nav-links" href="infPeUsr.php">Informações Pessoais</a></li>
        <li><a href="formasPay.php" class="dropdown-element nav-links">Configurações</a></li>
        <li><a class="dropdown-element nav-links" href="logout.php">Log out</a></li>
        </ul>
      </li>

      </li>
    </ul>
  </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const img_perfil = document.querySelector('#div_img a');
    console.log("Elemento img_perfil:", img_perfil);
    
    const dropdownMenu = document.querySelector('.dropdown_menu');
    console.log("Elemento dropdownMenu:", dropdownMenu);

    if (img_perfil && dropdownMenu) {
        img_perfil.addEventListener('click', () => {
            if (dropdownMenu.style.display === 'none') {
                dropdownMenu.style.display = 'block';
                setTimeout(close_menu_bar, 5000);
            } else {
                dropdownMenu.style.display = 'none';
            }
        });

        function close_menu_bar() {
            dropdownMenu.style.display = 'none';
        }

        document.body.addEventListener('click', function(event) {
          if (event.target !== img_perfil && event.target.parentNode !== img_perfil) {
            dropdownMenu.style.display = 'none';
            }
        });
    } else {
        console.error("Um ou ambos os elementos não foram encontrados no DOM.");
    }
});



        

</script>