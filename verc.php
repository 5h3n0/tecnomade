<?php
// Função para gerar o ícone de seta para a esquerda
function arrowLeftIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <path d="m12 19-7-7 7-7" />
        <path d="M19 12H5" />
    </svg>';
}

// Função para gerar o ícone do Facebook
function facebookIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
    </svg>';
}

// Função para gerar o ícone do Instagram
function instagramIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
    </svg>';
}

// Função para gerar o ícone de meia estrela
function starHalfIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <path d="M12 17.8 5.8 21 7 14.1 2 9.3l7-1L12 2" />
    </svg>';
}

// Função para gerar o ícone de estrela
function starIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
    </svg>';
}

// Função para gerar o ícone de círculo de usuário
function userCircleIcon($class = '') {
    return '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'">
        <circle cx="12" cy="12" r="10" />
        <circle cx="12" cy="10" r="3" />
        <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662" />
    </svg>';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoMade</title>
    <!-- Estilos CSS para a sua interface de usuário -->
    <style>
        /* Estilos para o layout principal */
        body {
            background: black !important;
        }
     
    </style>
</head>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoMade</title>
    <!-- Adicionando Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalize seus estilos aqui */
    </style>
</head>
<body class="">
    <header class="container py-4 border-bottom border-gray-800">
        <div class="d-flex align-items-center">
            <!-- Ícone de seta para a esquerda -->
            <?= arrowLeftIcon('h-6 w-6 me-2') ?>
            <h1 class="m-0 fs-4">TecnoMade</h1>
        </div>
    </header>
    <main class="container py-4">
        <div class="row">
            <section class="col-md-6">
                <h2 class="text-lg font-bold mb-4">Avaliações</h2>
                <div class="card bg-[#1a1a1a] text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- Avatar Image -->
                            <!-- Supondo que você tenha uma imagem de avatar padrão -->
                            <div class="ms-3">
                                <p class="font-medium">Nome do Usuário</p>
                                <div class="d-flex">
                                    <!-- Ícones de estrela -->
                                    <!-- Supondo que você tenha lógica para exibir as estrelas -->
                                </div>
                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-md-6">
                <div class="d-flex flex-column align-items-center mb-4">
                    <div class="border border-gray-700 p-1 rounded-circle">
                        <!-- Ícone de círculo de usuário -->
                    </div>
                    <h3 class="text-2xl font-bold mt-2">Nome Completo</h3>
                    <div class="d-flex align-items-center mt-1">
                        <!-- Ícones de estrela -->
                    </div>
                    <button class="btn btn-primary mt-2">Contratar serviço</button>
                </div>
                <p class="text-center mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua...
                </p>
                <div class="row">
                    <!-- Exemplos de imagens de serviço -->
                    <!-- Supondo que você tenha imagens para os exemplos de serviço -->
                </div>
            </section>
        </div>
    </main>
    <footer class="container py-4 border-top border-gray-800">
        <div class="d-flex justify-content-center">
            <!-- Ícones de mídia social -->
            <?= instagramIcon('h-6 w-6 me-4 text-primary') ?>
            <?= facebookIcon('h-6 w-6 text-primary') ?>
        </div>
    </footer>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
