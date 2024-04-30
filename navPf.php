<?php
if (!isset($_SESSION)) {
  session_start();
}

include ("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
  <link rel="stylesheet" href="./css/style_home.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .nav-img img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin: -5px 0 -40px 0;
      border: 2px solid rgb(13, 107, 91);
      object-fit: cover;
      transition: 1s;
    }
    .nav-img img:hover {
    scale: 1.1;
    background-color: rgb(13, 107, 91);
    transition: 1s;
    cursor: pointer;
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
      <li><a href="homePf.php" class="nav-links">Home</a></li>
      <li><a href="paginaDeServicosParaPrestador.php" class="nav-links">Services</a></li>
      <li><a href="#" class="nav-links">Contact</a></li>
      <li><a href="#" class="nav-links">About</a></li>

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