<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/formasPay.css" >
    <link rel="stylesheet" href="./css/default.css">


    <title></title>
    
</head>
<body>

<div class="header cleafix">
	<div class="container_nav">
			<img src="./imgs/icon_logo_nav_bar.png" class="logo" />
	</div>
	</div>


<div class="conteiner_pay_pix">
    <div class="title_pay_pix"><svg class="icon_method_pay"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M242.4 292.5C247.8 287.1 257.1 287.1 262.5 292.5L339.5 369.5C353.7 383.7 372.6 391.5 392.6 391.5H407.7L310.6 488.6C280.3 518.1 231.1 518.1 200.8 488.6L103.3 391.2H112.6C132.6 391.2 151.5 383.4 165.7 369.2L242.4 292.5zM262.5 218.9C256.1 224.4 247.9 224.5 242.4 218.9L165.7 142.2C151.5 127.1 132.6 120.2 112.6 120.2H103.3L200.7 22.76C231.1-7.586 280.3-7.586 310.6 22.76L407.8 119.9H392.6C372.6 119.9 353.7 127.7 339.5 141.9L262.5 218.9zM112.6 142.7C126.4 142.7 139.1 148.3 149.7 158.1L226.4 234.8C233.6 241.1 243 245.6 252.5 245.6C261.9 245.6 271.3 241.1 278.5 234.8L355.5 157.8C365.3 148.1 378.8 142.5 392.6 142.5H430.3L488.6 200.8C518.9 231.1 518.9 280.3 488.6 310.6L430.3 368.9H392.6C378.8 368.9 365.3 363.3 355.5 353.5L278.5 276.5C264.6 262.6 240.3 262.6 226.4 276.6L149.7 353.2C139.1 363 126.4 368.6 112.6 368.6H80.78L22.76 310.6C-7.586 280.3-7.586 231.1 22.76 200.8L80.78 142.7H112.6z"/></svg> Pagar com Pix</div>
    <div id="qrcode"></div>
    <p>Escaneie o QR Code ou copie o código abaixo, cole em seu banco</p>
    <div id="pixKeyContainer">
        <input type="text" id="pixKey" readonly value="randomkey">
        <button id="copyBtn">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16,20H8a3,3,0,0,1-3-3V7A1,1,0,0,0,3,7V17a5,5,0,0,0,5,5h8a1,1,0,0,0,0-2ZM21,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19l-.09,0L14.06,2H10A3,3,0,0,0,7,5V15a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V9S21,9,21,8.94ZM15,5.41,17.59,8H16a1,1,0,0,1-1-1ZM19,15a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h3V7a3,3,0,0,0,3,3h3Z" fill="#00917e"/></svg>
        </button>
        <div class="aviso_copy">Copiado"</div>
      </div>
    <div class="bloco_alerta">
    <p>Antes de efetuar o pagamento, leia atentamente as regras:</p>
    <p>* Não aceitamos depósitos de terceiros, ou seja, o valor depositado deve vir
de uma conta com o seu CPF/CNPJ. *</p>
    <p>* O valor do depositado ndo pode ultrapassar o seu limite disponível *</p>
</div>
<button class="btn_enviar_code" onclick="backhome()">Continuar Navegando</button>

</div>


<div class="background">
    <div class="animation">
    </div>
  </div>

<div class="img_pix_icon_deco"><img src="https://www.imagensempng.com.br/wp-content/uploads/2023/06/logo-pix-icone-1024.png"></div>

<footer class="footer_sigle_slim">
        <p>Copyright&copy; 2023, Todos os direitos reservados <a href="#">Tecnomade_Enterprise</a></p>
        <!-- <a href="">Contact</a>
        <a href="">Privacy & Terms</a> -->
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>

    function generateQRCode(data) {
    document.getElementById('qrcode').innerHTML = "";
    
    new QRCode(document.getElementById('qrcode'), {
        text: data,
        width: 328,
        height: 300
    });
}

function getRandomData() {
    return 'data-' + Math.floor(Math.random() * 100000);
}

function updateQRCode() {
    const data = getRandomData();
    generateQRCode(data);
}

updateQRCode();
setInterval(updateQRCode, 10000);


function generateRandomPixKey() {
  const keyType = Math.floor(Math.random() * 2);
  let pixKey;

  switch (keyType) {
    case 0:
    pixKey = `${Math.floor(Math.random() * 100000000).toString(16).padStart(8, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 1000000000000).toString(16).padStart(12, '0')}`;
      break;
    case 1: 
      pixKey = `${Math.floor(Math.random() * 100000000).toString(16).padStart(8, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 10000).toString(16).padStart(4, '0')}-${Math.floor(Math.random() * 1000000000000).toString(16).padStart(12, '0')}`;
      break;
  }

  return pixKey;
}

const pixKeyInput = document.getElementById('pixKey');
const copyBtn = document.getElementById('copyBtn');
const aviso = document.querySelector(".aviso_copy");

pixKeyInput.value = generateRandomPixKey();

copyBtn.addEventListener('click', () => {
  const input = document.createElement('input');
  input.value = pixKeyInput.value;
  document.body.appendChild(input);
  input.select();
  document.execCommand('copy');
  document.body.removeChild(input);
  aviso.style.display = "block";
  setTimeout(() => {
    aviso.style.display = "none"
  }, 2000);

});

function backhome(){
    window.location.href = "homeUsr.php";
};
    
</script>

</body>
</html>