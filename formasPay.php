<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/formasPay.css" >
    <link rel="stylesheet" href="./css/default.css">

    <style>
        body{
            background-image: url("./imgs/skyline8.jpg") !important;
            background-size: cover !important;
        }
    </style>

    <title>Formas de Pagamento</title>

</head>

<body>

<?php
    include_once "navUsr.php";
?>
    
    <div class="container_method_pay">
        <h2>Formas de pagamento</h2>
        
        <a href="cartao.php">
            <div class="payment-option" id="credit-card">
                <div class="payment-icon">
                    <i class=""><svg class="icon_method_pay" id="Layer_1_1_" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M0,12c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V7H0V12z"/><path d="M14,2H2C0.895,2,0,2.895,0,4v2h16V4C16,2.895,15.105,2,14,2z"/></svg></i>
                </div>
                <div class="payment-description"><p>Crédito</p></div>
                <i class="arrow_right_redi"><svg height="35px" id="Layer_1"" version="1.1" viewBox="0 0 512 512" width="35px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg></i>
            </div>
        </a>

        
        <a href="cartao.php">
            <div class="payment-option" id="debit-card">
                <div class="payment-icon">
                    <i class=""><svg class="icon_method_pay"  version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><g id="card"><path d="M20,3H4C1.8,3,0,4.8,0,7v1c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V7C24,4.8,22.2,3,20,3z"/><path d="M23,11H1c-0.6,0-1,0.4-1,1v5c0,2.2,1.8,4,4,4h16c2.2,0,4-1.8,4-4v-5C24,11.4,23.6,11,23,11z M11,18H5c-0.6,0-1-0.4-1-1    s0.4-1,1-1h6c0.6,0,1,0.4,1,1S11.6,18,11,18z M19,15h-2c-0.6,0-1-0.4-1-1s0.4-1,1-1h2c0.6,0,1,0.4,1,1S19.6,15,19,15z"/></g></g></svg></i>
                </div>
                <div class="payment-description"><p>Débito</p></div>
                <i class="arrow_right_redi"><svg height="35px" id="Layer_1"" version="1.1" viewBox="0 0 512 512" width="35px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg></i>
            </div>
        </a>
        
<a href="methodPix.php">
    
            <div class="payment-option" id="bank-slip" >
                <div class="payment-icon">
                    <i class=""><svg class="icon_method_pay"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M242.4 292.5C247.8 287.1 257.1 287.1 262.5 292.5L339.5 369.5C353.7 383.7 372.6 391.5 392.6 391.5H407.7L310.6 488.6C280.3 518.1 231.1 518.1 200.8 488.6L103.3 391.2H112.6C132.6 391.2 151.5 383.4 165.7 369.2L242.4 292.5zM262.5 218.9C256.1 224.4 247.9 224.5 242.4 218.9L165.7 142.2C151.5 127.1 132.6 120.2 112.6 120.2H103.3L200.7 22.76C231.1-7.586 280.3-7.586 310.6 22.76L407.8 119.9H392.6C372.6 119.9 353.7 127.7 339.5 141.9L262.5 218.9zM112.6 142.7C126.4 142.7 139.1 148.3 149.7 158.1L226.4 234.8C233.6 241.1 243 245.6 252.5 245.6C261.9 245.6 271.3 241.1 278.5 234.8L355.5 157.8C365.3 148.1 378.8 142.5 392.6 142.5H430.3L488.6 200.8C518.9 231.1 518.9 280.3 488.6 310.6L430.3 368.9H392.6C378.8 368.9 365.3 363.3 355.5 353.5L278.5 276.5C264.6 262.6 240.3 262.6 226.4 276.6L149.7 353.2C139.1 363 126.4 368.6 112.6 368.6H80.78L22.76 310.6C-7.586 280.3-7.586 231.1 22.76 200.8L80.78 142.7H112.6z"/></svg></i>
                </div>
            <div class="payment-description"><p>PIX</p></div>
                <i class="arrow_right_redi"><svg height="35px" id="Layer_1"" version="1.1" viewBox="0 0 512 512" width="35px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg></i>
            </div>
</a>


        <a href="">
            <div class="payment-option" id="bank-transfer">
                <div class="payment-icon">
                    <i class=""><svg class="icon_method_pay" id="Layer_1" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M13.1049805,10.0252075l0.2247925-0.9014893l-0.5487061-0.1366577l-0.218811,0.8776245   c-0.144165-0.0360107-0.2923584-0.0698853-0.4395752-0.1034546l0.2203369-0.8834229l-0.5482178-0.1367188l-0.2249146,0.901001   c-0.1194458-0.0271606-0.2366333-0.0540161-0.3503418-0.0822754l0.0006104-0.0028687L10.463562,9.368042l-0.1460571,0.5860596   c0,0,0.4071045,0.0932007,0.3985596,0.098999c0.222168,0.0554199,0.2622681,0.2024536,0.2555542,0.3190308l-0.2558594,1.0268555   c0.0152588,0.0039673,0.0350952,0.0094604,0.0570679,0.0183105c-0.0183105-0.0045776-0.0378418-0.0095825-0.0579834-0.0143433   l-0.3588867,1.4384155c-0.0271606,0.0673828-0.0961304,0.1687012-0.2514648,0.130249   c0.0054932,0.0079346-0.3986816-0.0994263-0.3986816-0.0994263l-0.2723389,0.6279907l0.7139282,0.1779175   c0.1327515,0.0332642,0.2630615,0.0681763,0.3910522,0.1010132l-0.2270508,0.9116211l0.5480957,0.1367188l0.2249146-0.9018555   c0.1496582,0.0405273,0.2949219,0.078064,0.4371338,0.1133423l-0.223999,0.8977661l0.5485229,0.1367188l0.2271729-0.9099731   c0.9354858,0.177124,1.6390381,0.1057129,1.9351807-0.7404785c0.2386475-0.6812744-0.0119019-1.0743408-0.5041504-1.3306274   c0.3584595-0.0827026,0.628479-0.3184204,0.7005005-0.805481C14.3044434,10.62146,13.7977295,10.2636719,13.1049805,10.0252075z    M12.9511719,13.0445557c-0.1694946,0.6814575-1.3165894,0.3131104-1.6885986,0.2206421l0.3013916-1.2076416   C11.935791,12.1503296,13.128479,12.3340454,12.9511719,13.0445557z M13.1210327,11.2769165   c-0.1547241,0.619812-1.1095581,0.3048706-1.4193115,0.2276611l0.2731323-1.0953369   C12.2845459,10.4864502,13.2819824,10.6304932,13.1210327,11.2769165z" /><path d="M22,3H2C0.8974609,3,0,3.8969727,0,5v14c0,1.1030273,0.8974609,2,2,2h20c1.1025391,0,2-0.8969727,2-2V5   C24,3.8969727,23.1025391,3,22,3z M16.8503418,13.2095337c-0.6678467,2.6783447-3.3811646,4.3083496-6.0603027,3.6405029   c-2.6780396-0.6678467-4.3083496-3.3806763-3.6400757-6.059082c0.6675415-2.6786499,3.3807373-4.3088379,6.059082-3.6411133   C15.8880615,7.817688,17.5181885,10.5308228,16.8503418,13.2095337z" /></g></svg></i>
                </div>
                <div class="payment-description"><p>Transferência bancária</p></div>
                    <i class="arrow_right_redi"><svg height="35px" id="Layer_1"" version="1.1" viewBox="0 0 512 512" width="35px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg></i>
                 </div>
        </a>
        
    </div>

    <div class="relogio">
        <img src="./imgs/back2.png" class="logo_relogio">
        <span class="horas">00 </span><span class="point_space">:</span><span class="minutos">00 </span><span class="point_space">:</span><span class="segundos">00</span>
    </div>

    <footer class="footer_sigle_slim">
    <p>Copyright&copy; 2023, Todos os direitos reservados <a href="#">Tecnomade_Enterprise</a></p>
    <!-- <a href="">Contact</a>
    <a href="">Privacy & Terms</a> -->
</footer>

        <script>

            const relogio = document.querySelector('.relogio');
            const horas = document.querySelector('.horas');
            const minutos = document.querySelector('.minutos');
            const segundos = document.querySelector('.segundos');

            function atualizarRelogio() {
            const agora = new Date();
            const hora = agora.getHours();
            const minuto = agora.getMinutes();
            const segundo = agora.getSeconds();

            horas.textContent = hora.toString().padStart(2, '0');
            minutos.textContent = minuto.toString().padStart(2, '0');
            segundos.textContent = segundo.toString().padStart(2, '0');
            }

            atualizarRelogio();
            setInterval(atualizarRelogio, 1000);


        </script>

</body>

</html>