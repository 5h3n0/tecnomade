<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/forgot_pass.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <?php
        include_once "navHome.php"
    ?>
    <canvas id="c"></canvas>
<div class="bloco_background">
    <div class="conteiner_recover" id="div_email">
            <svg enable-background="new 0 0 91.8 92.6" class="exclamacao_alert" version="1.0" viewBox="0 0 91.8 92.6" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M45.9,3.6c-23.5,0-42.5,19-42.5,42.5c0,23.5,19,42.5,42.5,42.5c23.5,0,42.5-19,42.5-42.5  C88.4,22.7,69.4,3.6,45.9,3.6z M43.7,21.1h4.3c0.5,0,0.9,0.4,0.9,0.9l-0.6,34.5c0,0.5-0.4,0.9-0.9,0.9h-3c-0.5,0-0.9-0.4-0.9-0.9  L42.8,22C42.8,21.5,43.2,21.1,43.7,21.1z M48.6,71.2c-0.8,0.8-1.7,1.1-2.7,1.1c-1,0-1.9-0.3-2.6-1c-0.8-0.7-1.3-1.8-1.3-2.9  c0-1,0.4-1.9,1.1-2.7c0.7-0.8,1.8-1.2,2.9-1.2c1.2,0,2.2,0.5,3,1.4c0.5,0.6,0.8,1.3,0.9,2.1C49.9,69.3,49.5,70.3,48.6,71.2z"/></svg>
            <h1>Forgot password</h1>
            <p>Digite seu e-mail e enviaremos um código de verificação para redefinir sua senha</p>
            <label for="email">Email:</label>
            <input type="email" id="email_recover" name="email" placeholder="Insira o endereço email" required>
            <span class="error-message" id="email-error"></span>
            <button id="btn_enviar_code">Enviar código</button>
        
        <a href="lgcd.php">
            <p class="redi_login"><svg id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="voltar_bnt"><g><g id="Icon-Arrow-Left" transform="translate(28.000000, 328.000000)"><path class="st0" d="M4-272.1c-13.2,0-23.9-10.7-23.9-23.9S-9.2-319.9,4-319.9s23.9,10.7,23.9,23.9     S17.2-272.1,4-272.1L4-272.1z M4-317.3c-11.7,0-21.3,9.6-21.3,21.3s9.6,21.3,21.3,21.3s21.3-9.6,21.3-21.3S15.7-317.3,4-317.3     L4-317.3z" id="Fill-25"/><polyline class="st0" id="Fill-26" points="4.5,-282.3 -9.2,-296 4.5,-309.7 6.3,-307.8 -5.4,-296 6.3,-284.2 4.5,-282.3    "/><polygon class="st0" id="Fill-27" points="-7.3,-297.4 16.7,-297.4 16.7,-294.6 -7.3,-294.6    "/></g></g></svg>
            Back to login
        </a></p>
    </div>
    
    
    
    
    
    <div class="conteiner_recover ajst_larg_verify" style="display: none;">
        <svg id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="voltar_bnt close_code_verify "><g><g id="Icon-Arrow-Left" transform="translate(28.000000, 328.000000)"><path class="st0" d="M4-272.1c-13.2,0-23.9-10.7-23.9-23.9S-9.2-319.9,4-319.9s23.9,10.7,23.9,23.9     S17.2-272.1,4-272.1L4-272.1z M4-317.3c-11.7,0-21.3,9.6-21.3,21.3s9.6,21.3,21.3,21.3s21.3-9.6,21.3-21.3S15.7-317.3,4-317.3     L4-317.3z" id="Fill-25"/><polyline class="st0" id="Fill-26" points="4.5,-282.3 -9.2,-296 4.5,-309.7 6.3,-307.8 -5.4,-296 6.3,-284.2 4.5,-282.3    "/><polygon class="st0" id="Fill-27" points="-7.3,-297.4 16.7,-297.4 16.7,-294.6 -7.3,-294.6    "/></g></g></svg>
        
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="icon_sheild_vf"><g data-name="Shield Lock" id="Shield_Lock"><path class="cls-1" d="M28,6C19.51,6,16.84,2.46,16.82,2.43a1,1,0,0,0-1.64,0S12.49,6,4,6A1,1,0,0,0,3,7v8.76c0,9.25,7.11,12,11.35,13.66l1.27.5a.94.94,0,0,0,.76,0l1.27-.5C21.89,27.77,29,25,29,15.76V7A1,1,0,0,0,28,6Z"/><path class="cls-2" d="M16,11a3,3,0,0,0-1,5.82V20a1,1,0,0,0,2,0V16.82A3,3,0,0,0,16,11Z"/></g></svg>
        <div class="div_verify">
                <h1>Verification</h1>
                <p>Digite o código de 6 dígitos que enviamos para você em <span id="adress_email"></span></p>
                <p class="description">Pode levar até um minuto para você receber este código.</p>
            </div>

            <div class="inputs">
                <input placeholder="" type="text" id="digito_1" maxlength="1">
                <input placeholder="" type="text" id="digito_2" maxlength="1">
                <input placeholder="" type="text" id="digito_3" maxlength="1">
                <input placeholder="" type="text" id="digito_4" maxlength="1">
                <input placeholder="" type="text" id="digito_5" maxlength="1">
                <input placeholder="" type="text" id="digito_6" maxlength="1">
            </div>

            <p id="no-email-found" style="display: none;">Código Inválido</p>
            <button type="submit" id="btn_verificar_code">Verificar</button>
            <p class="resend">Você não recebe o código ?<a href="#resending_code" class="resend-action"> Reenviar</a></p>
        </div>

    <div class="conteiner_recover ajs_alt_redefi" style="display: none;">
            <svg enable-background="new 0 0 64 64" height="64px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="64px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="key_recover_pass" ><g id="keywords"><path d="M32,13c-2.757,0-5,2.243-5,5s2.243,5,5,5s5-2.243,5-5S34.757,13,32,13z M32,22c-2.209,0-4-1.791-4-4   s1.791-4,4-4s4,1.791,4,4S34.209,22,32,22z" fill="#37474F"/><path d="M45,23c0-7.181-5.819-13-13-13s-13,5.819-13,13c0,5.015,2.842,9.358,7,11.526V54l5,5l7-9l-3-3v-6l3-3   v-3.474C42.158,32.358,45,28.015,45,23z M30.906,57.492L30,56.585V35c0-0.551,0.449-1,1-1s1,0.449,1,1v21.085L30.906,57.492z    M37.538,33.64L37,33.92v0.606v3.06l-2.707,2.707L34,40.586V41v6v0.414l0.293,0.293l2.375,2.376L33,54.8V35c0-1.103-0.897-2-2-2   s-2,0.897-2,2v20.586l-2-2v-19.06V33.92l-0.538-0.28C22.476,31.561,20,27.484,20,23c0-6.617,5.383-12,12-12s12,5.383,12,12   C44,27.484,41.524,31.561,37.538,33.64z" fill="#37474F"/><path d="M24,9.144l-0.5-0.866c-1.242,0.717-2.343,1.581-3.328,2.538L17.283,6H8V5H5v3h3V7h8.717l2.727,4.544   c-0.915,1.004-1.683,2.112-2.323,3.283L14.25,11H12v-1H9v3h3v-1h1.75l2.85,3.8l0.026-0.02c-0.484,1.034-0.858,2.113-1.126,3.22   h-3.232l-2-3H8v-1H5v3h3v-1h1.732l2,3h3.55c-0.236,1.313-0.311,2.655-0.233,4h-3.358l-2,4H8v-1H5v3h3v-1h2.309l2-4h2.814   c0.261,2.228,0.964,4.438,2.155,6.5l0.866-0.501C13.725,23.347,16.347,13.562,24,9.144z M7,7H6V6h1V7z M11,12h-1v-1h1V12z M7,17H6   v-1h1V17z M7,29H6v-1h1V29z" fill="#37474F"/><path d="M59,19v-3h-3v1h-2.309l-2,4h-2.814c-0.261-2.228-0.964-4.438-2.155-6.501L45.856,15   c4.419,7.652,1.797,17.438-5.856,21.855l0.5,0.866c1.229-0.709,2.32-1.563,3.298-2.508L46.691,41H56v1h3v-3h-3v1h-8.691   l-2.765-5.53c0.907-0.993,1.669-2.088,2.308-3.246L49.717,36H52v1h3v-3h-3v1h-1.717l-2.854-4.757l-0.088,0.053   c0.5-1.057,0.884-2.162,1.159-3.295h3.191l2,4H56v1h3v-3h-3v1h-1.691l-2-4h-3.592c0.237-1.313,0.311-2.655,0.234-4h3.358l2-4H56v1   H59z M57,16.999h1v1h-1V16.999z M57,40L57,40l1-0.001v1h-1V40z M53,34.999h1v1h-1V34.999z M57,30L57,30l1-0.001v1h-1V30z" fill="#37474F"/></g></svg>
            <h1>Recover password</h1>
            <p>escolha uma combinação forte de letras, números e caracteres especiais para garantir a máxima segurança.</p>
                <div id="password-reset">
                <label for="newPassword">Nova senha:</label>
                <input type="password" id="password1" placeholder="Digite uma nova senha" required>
                <span class="erroPassword1"></span>
                <label for="ComfirmaSenha">Confirmar senha:</label>
                <input type="password" id="password2" placeholder="Confirme a nova senha" required>
                <span class="erroPassword2"></span>
            </div>
            <button type="submit" id="reset-button">Redefinir</button>        
        </div>
</div>

<div class="alert_box_sucesso" style="display: none;">
    <div class="flexdiv_alert">
    <button onclick="btn_close_alerta()">X</button>
    <svg height="117px" version="1.1" viewBox="0 0 117 117" width="117px" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink"><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill-rule="nonzero" id="correct"><path d="M34.5,55.1 C32.9,53.5 30.3,53.5 28.7,55.1 C27.1,56.7 27.1,59.3 28.7,60.9 L47.6,79.8 C48.4,80.6 49.4,81 50.5,81 C50.6,81 50.6,81 50.7,81 C51.8,80.9 52.9,80.4 53.7,79.5 L101,22.8 C102.4,21.1 102.2,18.5 100.5,17 C98.8,15.6 96.2,15.8 94.7,17.5 L50.2,70.8 L34.5,55.1 Z" fill="#00917e" id="Shape"/><path d="M89.1,9.3 C66.1,-5.1 36.6,-1.7 17.4,17.5 C-5.2,40.1 -5.2,77 17.4,99.6 C28.7,110.9 43.6,116.6 58.4,116.6 C73.2,116.6 88.1,110.9 99.4,99.6 C118.7,80.3 122,50.7 107.5,27.7 C106.3,25.8 103.8,25.2 101.9,26.4 C100,27.6 99.4,30.1 100.6,32 C113.1,51.8 110.2,77.2 93.6,93.8 C74.2,113.2 42.5,113.2 23.1,93.8 C3.7,74.4 3.7,42.7 23.1,23.3 C39.7,6.8 65,3.9 84.8,16.2 C86.7,17.4 89.2,16.8 90.4,14.9 C91.6,13 91,10.5 89.1,9.3 Z" fill="#00917e" id="Shape"/></g></g></svg>
    <h2>Senha Redefinida com êxito</h2>
    </div>
</div>

<?php
    include_once "loading_ghost.php";
?>



<footer class="footer_sigle_slim">
    <p>Copyright&copy; 2023, Todos os direitos reservados <a href="#">Tecnomade_Enterprise</a></p>
    <!-- <a href="">Contact</a>
    <a href="">Privacy & Terms</a> -->
</footer>



<script src="./js/forgot_pass.js"></script>

</body>
</html>