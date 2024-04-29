<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('connect.php');
if (!isset($_SESSION['usrCadastro'])) {
    header("location: lgcd.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <link rel="stylesheet" href="./css/end.css">

    <style>
        body {
          background-image: url("./imgs/1110251_Animation_Envelope_Glow_1280x720.gif");
          background-size: cover;
          padding: 0;
          margin: 0;
          box-sizing: border-box;
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
        }    
    </style>

</head>

<body>

            <form method="post" action="endUsrBd.php" class="endUsr">
                <h1 class="titleForms titleEnd"> Cadastrar Endereço </h1>
                <label for="cep" class="lbls">Cep:</label>
                <input name="cep" type="text" id="cep" value="" maxlength="9" onblur="pesquisacep(this.value);" autocomplete="off" oninput="formatCep(this)" placeholder="Ex: 08000-000">
                <label for="rua" class="lbls">Rua:</label>
                <input name="rua" type="text" id="rua" placeholder="Ex: Rua Mara Lucia" />
                <label for="bairro" class="lbls">Bairro:</label>
                <input name="bairro" type="text" id="bairro" placeholder="Ex: Vila São Carlos "/>
                <label for="cidade" class="lbls">Cidade:</label>
                <input name="cidade" type="text" id="cidade" placeholder="Ex: Itaquaquecetuba" />
                <label for="uf" class="lbls">Estado:</label>
                <input name="uf" type="text" id="uf" placeholder="Ex: SP" />
                <label for="num" class="lbls">Número:</label>
                <input name="num" type="text" id="num" placeholder="Ex: 35" />
                <label for="comp" class="lblComp lbls">Complemento:</label>
                <input name="comp" type="text" id="comp" placeholder="Ex: Casa A"/>
                <input type="submit" class="btn_end_env" value="Cadastrar" name="enviarForm">
                <div class="animation_rotate"></div>
                <div class="animation_rotate2"></div>
            </form>
 
    <script src="./js/endereco.js"></script>
    <script src="./js/format.js"></script>

</body>

</html>