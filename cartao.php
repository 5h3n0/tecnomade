<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <link rel="stylesheet" href="./css/cartao.css">
  <link rel="stylesheet" href="./css/style_home.css">
  <title></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="./css/style_home.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
  <div class="background">
    <div class="animation">
    </div>
  </div>
<?php
include_once('navHome.php');
?>

  <h1 class="title_top"><span style="text-transform:uppercase;">Preencha os dados</span><br> Para que a contratação seja realizada com sucesso</h1> 
  <main class="cont">

    <div class="cards">

      <div class="card-front">
        <div class="neonLine"></div>
        <div class="card-conteudo">
            <img src="./imgs/card-logo.svg" alt="" srcset="">
            <!-- <img src="./imgs/back2.png" class="logoTecnomade" alt="" srcset=""> -->
            <img src="./imgs/logo_white.png" class="logoTecnomade" alt="">
          <p id="number">0000 0000 0000 0000</p>
          <span class="card-front-dados">
            <span class="cardName">Nome do cartão</span>
            <span id="val">
              <span class="mes">00</span>/<span class="ano">00</span>
            </span>
          </span>

        </div>
      </div>
      <div class="card-back">
        <img src="./imgs/bg-card-back.png" alt="">
        <div class="card-conteudo">
          <span class="cvc" style="color:rgb(0, 0, 0); font-weight:bold;">000</span>
        </div>
      </div>
    </div>

    <section class="obrigado">
      <img src="./imgs/icon-complete.svg" alt="">
      <h2>Obrigado!</h2>
      <span>A Tecnomade agradece </span>
      <button><a href="homeUsr.php">Continue</a></button>
    </section>
    <form class="formulario" method="post">
    
      <div class="form-name">
        <label for="nome">Nome no Cartão:</label>
        <input type="text" maxlength="19" name="nome" id="nome" placeholder="Ex: Jane Appleseed">
      </div>

      <div class="form-number">
        <label for="number-card">Número do Cartão:</label>
        <input type="number" maxlength="16" name="numver-card" id="number-card" placeholder="Ex: 0000 0000 0000 0000">
      </div>

      <div class="form-date">
        <label for="expire">Validade:</label>
        <input type="text" maxlength="2" name="expire" placeholder="MM" id="mes">
        <input type="text" maxlength="2" name="expire" placeholder="AA" id="ano">
      </div>

      <div class="form-cvc">
        <label for="cvc">CVC</label>
        <input type="text" maxlength="3" name="cvc" id="cvc" placeholder="e.g. 123">
      </div>

      <button>Confirmar</button>
    </form>
  </main>

  </div>
<?php
include_once('footer.php');
?>

  <script src="./js/cartao.js"></script>
</body>

</html>