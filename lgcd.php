<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('connect.php');
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="./css/style_lg.css">
    <link rel="stylesheet" href="./css/default.css">

    <style>
        body,
        html {
            background-image: url(imgs/global-connections-background-social-media-banner.jpg);
        }
    </style>

</head>

<body>
    <?php
    include_once ('navHome.php');
        ?>
    <section class="container">

        <div class="contentBoxPf" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                class="btn_back_ini_esc-opcs" id="btn_back_ini_esc-opcsPf">
                <path fill="rgb(0, 148, 128)"
                    d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
            </svg>
            <h1 class="contentBoxTitle">Sou um Profissional</h1>
            <h2 class="quest">Já Possui Cadastro?</h2>
            <div class="opts">

                <button class="optPf" id="optOnePf">
                    Não, desejo me cadastrar.
                </button>

                <button id="optTwoPf" class="optPf">
                    Sim, já sou cadastrado.
                </button>
            </div>
            <div class="animation_rotate"></div>
            <div class="animation_rotate2"></div>
        </div>



        <div class="screenOptionlogin" id="screenOptionlogin">
            <h2>Seja <br> Bem-Vindo!</h2>
            <p>Faça login ou se cadastre aqui <br> Desejo logar ou me cadastrar como :</p>
            <button class="btn-screenOptionlogin" id="ircardPf">Profissional</button>
            <button class="btn-screenOptionlogin" id="ircardUser">Usuário</button>
            <div class="animation_rotate"></div>
            <div class="animation_rotate2"></div>
        </div>

        <div class="contentBoxUsr" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                class="btn_back_ini_esc-opcs " id="btn_back_ini_esc-opcsUsr">
                <path fill="rgb(0, 148, 128)"
                    d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
            </svg>
            <h1 class="contentBoxTitle ajst_contentBoxTitle_usr ">SOU UM CLIENTE</h1>
            <h2 class="quest">Já Possui Cadastro?</h2>
            <div class="opts">
                <button class="btn-screenOptionlo optUsr" id="optOneUsr">
                    Não, desejo me cadastrar
                </button>
                <button class="btn-screenOptionlo optUsr" id="optTwoUsr">
                    Sim, já sou cadastrado
                </button>
            </div>
            <div class="animation_rotate"></div>
            <div class="animation_rotate2"></div>
        </div>



        <div class="boxForOpt boxForOptUsr">

            <div class="container-usr">

                <form action="loginUsrBd.php" method="post" class="lgUsr" id="lgUsr">

                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                        class="btn_back_ini_esc-opcs btn_back_ini_esc-opcsUser" id="btn_back_ini_esc-opcsUsr"
                        onclick="backUsr()">
                        <path fill="rgb(0, 148, 128)"
                            d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
                    </svg>
                    <!-- 
                    <span class="""><img src="./imgs/iconBack.png">voltar</span> -->

                    <h1 class="titleForms">Login de Usuário</h1>

                    <label for="email">Email:</label>

                    <input type="email" name="email" placeholder="Email:">

                    <label for="usrPass">Senha:</label>

                    <input type="password" name="usrPass" placeholder="Senha:">

                    <input type="submit" value="Login" name="enviarForm" class="btn-login">
                    <div class="div_ajust_linksCad_linkMlg">
                    <span class="linksCad" id="linkUsr" onclick="mdFormUsr()">Não possui Cadastro?</span>
                    </div>
                </form>

                <form action="registerUsrBd.php" method="post" class="cdUsr" id="cdUsr" autocomplete="off"
                    onsubmit="return validateForm()">

                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                        class="btn_back_ini_esc-opcs btn_back_ini_esc-opcsUser" id="btn_back_ini_esc-opcsUsr"
                        onclick="backUsr()">
                        <path fill="rgb(0, 148, 128)"
                            d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
                    </svg>
                    <h1 class="titleForms">Cadastro <br> Usuário</h1>

                    <label for="usrName" class="label-require">Nome:</label>
                    <input type="text" name="usrName" id="usrName" oninput="nameValidateUsr()"
                        placeholder="Digite seu nome:" required class="inputs require">
                    <span class="span-require">*Escreva seu nome completo*</span>

                    <label for="dtNasUsr" id="lblDtNas" class="label-require">Data de Nascimento:</label>
                    <input type="date" oninput="dataValidate()" name="dtNasUsr" id="dtNas" class="dtNas inputs require" required >
                    <span id="spanErrorNameUsr" class="span-require">*A idade mínima é 18 anos!*</span>

                    <label for="email" class="label-require">Email:</label>
                    <input type="email" name="email" placeholder="Digite seu Email:" oninput="emailValidate()"
                        class="inputs require" required>
                    <span class="span-require">*Digite um email válido*</span>

                    <label for="celUsr" id="lblCelUsr" class="label-require">Celular</label>
                    <input type="text" name="celUsr" id="inputCelUsr" placeholder="Digite seu Número:" autocomplete="off" required oninput="formatCell(this); celValidate()" maxlength="11" class="inputs require">
                    <span id="spanErrorCllrUsr" class="span-require"></span>

                    <label for="cpf" id="lblcpfUsrVal" class="label-require">CPF:</label>
                    <input type="text" id="inputCpfUsrVal" name="cpf" placeholder="Informe seu CPF:" class="doc inputs require" onkeyup="formatDoc(this)" oninput="cpfUsrVal()" maxlength="11" autocomplete="off" required>
                    <span id="spanErrorCpfUsr" class="span-require">*CPF Inválido*</span>

                    <label for="usrPass" id="labelPassUsr" class="label-require">Digite uma senha:</label>
                    <input type="password" name="usrPass" placeholder="Senha:" class="inputs require" autocomplete="off" id="inputPassUsr" required oninput="PassUsrVal()">
                    <span class="span-require" id="spanErrorPassUsr" >*A senha deve conter no mínimo 8 caracteres!*</span>

                    <label for="usrRpPass" id="labelCfPassUsr" class="label-require">Repita a senha:</label>
                    <input type="password" id="inputCfPassUsr" name="usrRpPass" placeholder="Senha:" oninput="PassCfUsrVal()" class="inputs require" autocomplete="off" required>
                    <span class="span-require" id="spanErrorCfPassUsr">*As senhas não conferem, verifique*</span>

                    <div class="gender">
                        <span class="custom-legend" >Gênero:</span>
                        <label for="f" class=" label_fem">Feminino
                        </label>
                        <input class="option" name="gender" type="radio" value="f">
                        <label for="m" class=" label_masc">Masculino
                        </label>
                        <input class="option" name="gender" type="radio" value="m">
                        <label for="o" class=" label_pnd" >P.N.D
                        </label>
                        <input class="option" name="gender" type="radio" value="o" required>

                    </div>
                    <div class="buttonsForm">
                        <input type="submit" value="Cadastrar" name="enviarForm" class="btn_cdst_sub">
                    </div>
                    <div class="div_ajust_linksCad_linkMlg">
                    <span class="linkMlg" id="linkUsr" onclick="mdFormCdUsr()">Já possui Cadastro?</span>
                    </div>
                </form>
            </div>
        </div>







        <div class="boxForOpt boxForOptPf">

            <div class="container-pf">
                <form action="loginPfBd.php" method="post" class="lgPf">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                        class="btn_back_ini_esc-opcs btn_back_ini_esc-opcsUser" id="btn_back_ini_esc-opcsUsr"
                        onclick="backPf()">
                        <path fill="rgb(0, 148, 128)"
                            d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
                    </svg>

                    <h1 class="titleForms">Login Profissional</h1>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email:">
                    <label for="pfPass">Senha:</label>
                    <input type="password" name="pfPass" placeholder="Senha:">
                    <input type="submit" value="Login" name="enviarForm" class="btn-login">
                    <div class="div_ajust_linksCad_linkMlg">
                    <span class="linksCad" id="linkPf" onclick="mdFormPf()">Não possui Cadastro?</span>
                    </div>
                </form>


<form action="registerPfBd.php" method="post" class="cdPf">
    <div class="container-pf">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                class="btn_back_ini_esc-opcs btn_back_ini_esc-opcsUser" id="btn_back_ini_esc-opcsUsr"
                onclick="backPf()">
                <path fill="rgb(0, 148, 128)"
                    d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
            </svg>


            <h1 class="titleForms">Cadastro <br> Profissional</h1>

            <label for="pfName" class="label-require">Nome:</label>
            <input type="text" name="pfName" placeholder="Digite seu Nome:" class="require"
                oninput="nameValidate()">
            <span class="span-require">*Escreva seu nome completo*</span>

            <label for="dtNasPf" id="lblDtNasPf" class="label-require lblDtNasPf">Data de Nascimento:</label>
            <input type="date" oninput="dataValidatePf()" name="dtNasPf" class="dtNas" id="inputDataNascPf">
            <span class="span-require" id="spanErrorDataNascUsr">*A idade mínima é 18 anos!*</span>

            <label for="email" class="label-require" id="labelEmailpf">Email:</label>
            <input type="email" oninput="emailValidatepf()" name="email" class="require" id="inputEmailPf" placeholder="Digite seu Email:" require>
            <span id="emailError" class="span-require"></span>

            <label for="celPf" class="label-require" id="labelCllrPf">Celular:</label>
            <input type="text" name="celPf" id="inputCllrPf" placeholder="Digite seu Número:" class="require"
                oninput="formatCell(this); celValidatepf()">
            <span id="phoneError" class="span-require" id="spanErrorCllrPf"></span>

            <label for="cnpj" class="label-require">CNPJ:</label>
            <input type="text" name="cnpj" placeholder="Informe seu CNPJ:" class="doc"
                oninput="cpfValidate()" maxlength="14" autocomplete="off">
            <span class="span-require"></span>


            <label for="pfPass" id="labelPass">Digite uma Senha:</label>
            <input type="password" name="pfPass" id="inputPasswordpf" placeholder="Senha:" autocomplete="off" oninput="passwordPf()">
            <span class="span-require" id="erroMsgPassPf">*CNPJ Inválido! Verifique e corrija*</span>

            <label for="pfRpPass" id="labelCfpassPf">Repita a Senha:</label>
            <input type="password" name="pfRpPass" id="inputCfPfPass" placeholder="Senha:" autocomplete="off" oninput="passwordPfCf()">
            <span class="span-require" id="erroMsgPassCfPf"></span>

            <div class="gender">
                <span class="custom-legend">Gênero:</span>

                <label for="f" class="label_fem">Feminino </label>
                <input class="option" name="gender" type="radio" value="f">

                <label for="m" class="label_masc">Masculino</label>
                <input class="option" name="gender" type="radio" value="m">

                <label for="o" class="label_pnd">P.N.D</label>
                <input class="option" name="gender" type="radio" value="o" >
            </div>

            <div class="buttonsForm">
                <input type="submit" value="Cadastrar" name="enviarForm">
            </div>
            <div class="div_ajust_linksCad_linkMlg">
            <span class="linkMlg" id="linkPf" onclick="mdFormCdPf()">Já possui Cadastro?</span>
            </div>
    </div>
</form>


                    </div>
            </div>
    </section>

    <script src="./js/endereco.js"></script>
    <script src="./js/scriptsLgcd.js"></script>
    <script src="./js/format.js"></script>
</body>

</html>