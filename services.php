<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link rel="stylesheet" href="./css/style_exi_services.css">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">

    <link rel="stylesheet" href="./css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <style>

    </style>
</head>

<body>

    <div class="services">
        <h1>Serviços Disponíveis</h1>
        <div class="box_filtro_search">
            <div class="group">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon" onclick="showLoading()">
                    <g>
                        <path
                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                        </path>
                    </g>
                </svg>

                <input id="filtro" name="filtro" class="input" type="search" placeholder="Procure aqui..." />
            </div>

            <label for="filtro" class="label_filtro">Filtrar : </label>
            <select id="filtroTipo" onchange="filtrarServicos()">
                <option value="">Todos</option>
                <option value="categoria">Categoria</option>
                <option value="profissional">Profissional</option>
                <option value="nomeDeServico">Serviço</option>
            </select>
        </div>
        <div class='bloco_servicos_ofe'>

            
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION['usrLogado'])) {
                header("Location:lgcd.php");
            }
            
            require_once 'connect.php';
            include_once 'navUsr.php';

            $sql = "SELECT services.*, prof.pfName, prof.imgName, categorias.nome AS catName
                FROM services
                INNER JOIN prof ON services.id_Pf = prof.id_Pf
                INNER JOIN categorias ON services.id_Cat = categorias.id_Cat ORDER BY RAND()";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='service' data-nome='{$row['nomeService']}' data-categoria='{$row['catName']}' data-profissional='{$row['pfName']}'>";
                    if ($imgData = $row['imgName']) {
                        $imgPf = 'upload/' . $row['imgName'];
                    }
                    echo "<img src='$imgPf' alt='Imagem do Profissional' class='imgPf'>";
                    echo "<div class='box_info_serv_disp'>";
                    echo "<h3>{$row['nomeService']}</h3>";
                    echo "<h3>Profissional : <span class='colors_itens_inform'> {$row['pfName']} </span></h3>";
                    echo "<h3>Categoria de serviço : <span class='colors_itens_inform'> {$row['catName']}</span></h3>";
                    echo "<p>{$row['descService']}</p>";
                    echo "<form action='contratService.php' method='post'>";
                    echo "<input type='hidden' name='id_servico' value='{$row['id_Service']}'>";
                    echo "<input type='hidden' name='id_Pf' value='{$row['id_Pf']}'>";
                    echo "<button type='submit'class='btn-contratar'>Contratar Serviço</button>";
                    
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum serviço disponível no momento.";
            }
            ?>
        </div>
        <div id="mensagemNaoEncontrado" style="display: none;">
            <p>Não foi possivel encontrar nada ... <br> Sem Resultados</p>
          

            <span class="msg_of_ghost">Me perdoe</span>
<svg id="ghostsSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560 375">
                <defs>
                    <filter id="a" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="12" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1.98"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".04" k2="1" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                    <filter id="b" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="7" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear" slope="3.8"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1.98"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".04" k2=".96" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                    <filter id="c" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="4" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear" slope="2"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".08" k2=".75" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
            <g id="ghost-all">
                <g fill="var(--ghost)" filter="url(#a)">
                    <path class="ghost body-outline" d="M141.7 310.8c-8 0-17.7-6.6-6.5-20.2s13.8-17.2 13.8-17.2c13.5-15.5 13.9-49.2 12.9-59.8-1-10.6-8.8-67 9.5-92.2 15.5-25.6 36.1-32 61.7-31.9 31.5 1.2 48 22.6 52.6 34.6 0 0 21.6 38.4 4.3 107-16.2 64.1-36.4 70.6-51.9 58.8 0 0-6.6-5.1-16.8 6.9-7.5 8.7-20.7 15.5-25.5 7.4 0 0-7.7-13.6-26.4-3.4.1-.1-20.4 10-27.7 10z"></path>
                    <path class="ghost arms" d="M171.2 189.7c-.2 6.7-42 4.5-47.7-18.5-1.2-4-4.9-6.8-9.3-6.8-5.4 0-9.7 4.4-9.7 9.7 0 1.1.2 2.2.5 3.2 9.4 31.9 47.9 36.2 72.1 64.7M293.1 199.1c1.8 10.9 14.2 35.1 41.3 32.6 4.1-.2 8.1 2.4 9.5 6.5 1.8 5.1-.9 10.7-5.8 12.5-1.1.3-2.1.5-3.2.5-15.7.7-36-5.3-47.7-19.5"></path>
                    <path class="ghost-left thumb-right" d="M332 233.5s2.8-6-.4-6.8c-3.2-.8-8.8 1.8-8.1 8.7.7 6.9 8.5-1.9 8.5-1.9"></path>
                </g>
                
                <path class="ghost-bright-highlight" fill="rgba(255,255,255,.6)" d="M200.5 283.2c7.7 7 15.5-.9 21.9-8.4 8.8-10.3 14.4-6 14.4-6 13.3 10.2 30.6 4.6 44.6-50.7 14.9-59.2-3.7-87-3.7-87-4.7-7.8-12.4-22.7-36.5-29.7l-.3-.5c23.4 3.2 33.1 17.5 39.4 29.3 0 0 18.5 33.1 3.7 92.3-13.9 55.3-31.2 60.9-44.6 50.7 0 0-5.7-4.4-14.4 6-6.4 7.5-14.2 13.4-21.9 6.4l-2.6-2.4z" filter="url(#b)"></path>
            <g id="sign">
                <path class="sign" d="M165.8 136.9l-11-66.3c-.5-3.2-3.8-6.6-6.6-6.1L30 84.3c-4 .8-5.5 5-5 8.2l11.1 66.2c.5 3.2 3.2 5.5 6 5l59.6-10 7.6 50.2 7.4-1.1-7.7-50.4 52.6-8.8c2.9-.5 4.7-3.5 4.2-6.7z" fill="#adadad"></path>
                <path class="sign" fill="#fff" d="M167.7 134.8l-11-66.3c-.5-3.2-3.2-5.5-6-5L31 83.7c-2.8.5-4.6 3.5-4.1 6.7L38 156.6c.5 3.2 3.2 5.5 6 5l59.6-10 7.6 50.2 7.4-1.1-7.7-50.4 52.6-8.8c2.9-.5 4.7-3.5 4.2-6.7z"></path>
                <path class="sign" d="M111.2 201.8l7.4-1.1-1.9 2.1-7.4 1.1 1.9-2.1z" fill="#bfbfbf"></path>
                
                </g><!-- /#sign -->
                <path class="ghost sign--thumb" fill="var(--ghost)" d="M114.7 170.9s-5.8-3.2-6.8 0 1.3 8.9 8.3 8.6c6.8-.4-1.5-8.6-1.5-8.6"></path>
                <path class="ghost arm-highlights" fill="var(--ghost-light)" d="M160.7 202.3c1.3 0-.1-6.5-.1-6.5-30.4 1.1-39.9-23.3-39.9-23.3s-1.2-2-4.6-2.1c0 0 .3 2.3-1.7 2.1-1.7-.2-3.9-1.2-4.5-.1-.7 1.1.5 5.2 5 5.3 0 0 2.1 0 3.2-.6 0 0 12.7 23.5 41.6 25.3h1zM293.9 210.1l-.9 7.7s9.5 22.2 44.1 22.7h4.7c0-1.1-.9-3.9-3.4-5.7-2.4-1.8-8.2-1.5-8.2-1.5 2.4-4 .5-5.5-1.9-4.8-2.9.9-3.2 4.8-3.1 4.8-21.7-2-31-22.5-31-22.5"></path>
                <g class="blush" fill="var(--blush)">
                    <ellipse class="ghost blush-left" cx="188.9" cy="169.5" rx="10.4" ry="4.7"></ellipse>
                    <ellipse class="ghost blush-right" cx="266.9" cy="169.5" rx="10.4" ry="4.7"></ellipse>
                </g>
             <g class="ghost mouths" fill="none" stroke-width="5" stroke="black" stroke-linecap="round" stroke-miterlimit="10"> 
                    <path class="ghost mouth--sad" stroke-width="6" stroke="black" fill="none" d="M215.5 177.5c2.3-1.1 7.6-3.1 14.3-2.2 4.1.5 7.3 2 9.2 3.1"></path>
                    
                </g>
                <g id="ghost--eyes">
                    <circle cx="262.4" class="ghost--eye-right" cy="151.2" r="7.5"></circle>
                    <circle cx="192.4" class="ghost--eye-left" cy="151.2" r="7.5"></circle>
                </g><!-- /#ghost-complete -->
                <ellipse class="ghost-shadow" fill="rgba(105,253,216,.5)" cx="182.7" cy="360" rx="120" ry="15" filter="url(#a)"></ellipse>
                
                
            </g></svg>
  
        </div>

        
    </div>
    
    <div class="loadingscreen" style="display: none;">
                <div id="page">
                <div id="container">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div id="h3">loading...</div>
                </div>
        </div>
    </div>


    <?php include_once ('footer.php'); ?>

    <script>
        const campoFiltro = document.getElementById('filtro');
        const selectTipoFiltro = document.getElementById('filtroTipo');
        const mensagemNaoEncontrado = document.getElementById('mensagemNaoEncontrado');

        function filtrarServicos() {
            const filtro = campoFiltro.value.toLowerCase();
            const tipoFiltro = selectTipoFiltro.value;
            const servicos = document.querySelectorAll('.service');
            let algumExibido = false;

            servicos.forEach(function (servico) {
                let exibir = false;

                if (tipoFiltro === 'categoria') {
                    const categoria = servico.getAttribute('data-categoria').toLowerCase();
                    exibir = categoria.includes(filtro);
                } else if (tipoFiltro === 'profissional') {
                    const profissional = servico.getAttribute('data-profissional').toLowerCase();
                    exibir = profissional.includes(filtro);
                } else if (tipoFiltro === 'nomeDeServico') {
                    const nome = servico.getAttribute('data-nome').toLowerCase();
                    exibir = nome.includes(filtro);
                } else {
                    const nome = servico.getAttribute('data-nome').toLowerCase();
                    const categoria = servico.getAttribute('data-categoria').toLowerCase();
                    const profissional = servico.getAttribute('data-profissional').toLowerCase();
                    exibir = nome.includes(filtro) || categoria.includes(filtro) || profissional.includes(filtro);
                }

                if (exibir) {
                    servico.style.display = 'block';
                    algumExibido = true;
                } else {
                    servico.style.display = 'none';
                }
            });

            if (!algumExibido) {
                mensagemNaoEncontrado.style.display = 'block';
            } else {
                mensagemNaoEncontrado.style.display = 'none';
            }
        }

        campoFiltro.addEventListener('input', filtrarServicos);

        mensagemNaoEncontrado.style.display = 'none';

    
        document.addEventListener("DOMContentLoaded", function() {
    const searchIcon = document.querySelector(".search-icon");
    const inputField = document.querySelector(".input");
    const loadingDiv = document.querySelector(".loadingscreen");

    function showLoading() {
        loadingDiv.style.display = "block";
        document.body.style.overflow = "hidden";

        setTimeout(hideLoading, 5000); // Oculta a div de carregamento após 5 segundos
    }

    function hideLoading() {
        loadingDiv.style.display = "none";
        document.body.style.overflow = "auto";
    }

    searchIcon.addEventListener("click", showLoading);
    inputField.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            showLoading();
        }
    });
});

    </script>
</body>

</html>