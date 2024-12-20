<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include('connect.php');
if(!isset($_SESSION['pfLogado'])){
    header( "Location: lgcd.php");
};
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="./css/style_home.css">
        <link rel="stylesheet" href="./css/chatbot1.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <title>Tecnomade - Home</title>
    </head>

</head>

<body>
    <?php 
    include_once('navPf.php');     
    ?>

<head>
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/chatbot1.css">
    <link rel="stylesheet" href="./css/default.css">
</head>

    <section class="screen_exibition_ini">
            <div class="slogan_home">
                <h2>Transformando <br> problemas em soluções <br> tecnológicas</h2>
            </div>

            <div class="box_button">
            <button onclick="location.href='sobrePf.php#entraEmContato'">Suporte</button>
                <button onclick="location.href='portifolio.php'">Portifólio</button>
                <button onclick="location.href='paginaDeServicosParaPrestador.php'">Serviços</button>
            </div>

            
        </section>


        <section class="bloco_information_services">


            <div>
                <img src="./imgs/roquete.gif" class="roguete_animation">
            </div>

            <div class="conteiner_text_services_ofe">
                <div class="title_section_seg">
                    <h3>Serviços que oferecemos</h3>
                </div>
                <div class="box_text_services">
                    <p>Desenvolvimento</p>
                </div>
                <div class="box_text_services">
                    <p>Suporte Técnico</p>
                </div>
                <div class="box_text_services">
                    <p>Cloud computing</p>
                </div>
                <div class="box_text_services">
                    <p>Infraestrutura de Redes</p>
                </div>
            </div>

        </section>

        <section class="bloco_contrate_profissionais">

            <div class="box_text_ctrtPf">
                <h3>Conecte-se nas <br> Melhores Oportunidades!</h3>
                <div class="bloco_de_texto">
                    <p>Ganhe a liberdade para escolher os projetos que mais lhe interessam. Na nossa plataforma, você pode divulgar seu trabalho de forma eficaz, destacando suas habilidades e experiências. Essa liberdade de escolha não só permite que você atue em projetos alinhados com seus interesses e habilidades, mas também oferece a oportunidade de ampliar seu conhecimento e impulsionar sua carreira para novos patamares. Não espere mais - junte-se a nós e liberte todo o potencial da sua trajetória profissional em TI.</p>
                </div>
            </div>

            <img src="./imgs/4a5ca0989ddca758537165efd9266396 (1).jpg" class="img_ctrtPf">


        </section>




        <section class="bloco_seja_profissional">

            <img src="./imgs/184489-873483996_small.gif" class="img_ctrtPf" alt="Img_sjPf">

            <div class="box_text_ctrtPf">
                <h3>Ferramentas Excepcionais</h3>
                <div class="bloco_de_texto">
                    <p> Na nossa plataforma, os profissionais têm acesso a uma gama incomparável de oportunidades de carreira. Além disso, oferecemos uma ferramenta exclusiva: o Portfólio Integrado. Com essa funcionalidade, os usuários podem destacar suas habilidades de forma visualmente cativante, enviando imagens e descrições dos projetos em que trabalharam anteriormente. Essa ferramenta não só permite que os talentos de TI exibam seu trabalho de maneira eficaz, mas também ajuda a demonstrar sua experiência e expertise para potenciais empregadores</p>
                </div>
                <button class="btn-saiba_more_story" id="redirecPorti" onclick="location.href='portifolio.php'">Saiba Mais</button>

            </div>
        </section>


        <section class="bloco_vantagens_tecomade">

            <div>
                <h2 class="title_section_tec">Quais as vantagens de utilizar a tecnomade</h2>
            </div>

            <div class="conteiner_advantage_and_disadvantage">




                <div class="e-card playing">
                    <div class="image"></div>

                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>


                    <div class="infotop">

                        <div class="box_vantagens_tecnomade">

                            <img src="./imgs/logo_white_png.png" class="img_representa_tecnomade">

                            <div>
                                <h3 class="tecnomade_title_vantagens">Tecnomade</h3>
                            </div>

                            <ul class="lista_advantage">
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Contrato sólido e confiável</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Reembolsos Rápidos</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Clientes autênticos e leais</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Interface intuitiva e clara</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Anúncios verídicos</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/check_11043262.png" class="img_vantagens_tecnomade">
                                        <p>Aprovação rápida e eficaz</p>
                                    </span></li>
                            </ul>

                        </div>
                    </div>

                </div>


                <div class="e-card playing">
                    <div class="image"></div>

                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>


                    <div class="infotop">

                        <div class="box_vantagens_tecnomade">

                            <img src="./imgs/cubo-3d.png" class="img_representa_outros">

                            <div class="tecnomade_title_desvantagens">
                                <h3>Outras Plataformas</h3>
                            </div>

                            <ul class="lista_advantage">
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Quebra de Contrato </p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Problemas com reembolso</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Clientes falsos</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Interface confusa</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Propagandas enganosas</p>
                                    </span></li>
                                <li><span>
                                        <img src="./imgs/erro_check.png" class="img_cncrt_erro_check"
                                            class="img_vantagens_tecnomade">
                                        <p>Demora na aprovação</p>
                                    </span></li>
                            </ul>

                        </div>
                    </div>

                </div>



            </div>


        </section>

        <section class="section_info_garantia_tecno">

            <div class="box_text_info_garantia">
                <h3>Garantia tecnomade</h3>
                <p>
                    Garantir a satisfação do cliente é nossa prioridade máxima. Por isso, oferecemos uma política de
                    garantia e reembolso abrangente. Estamos confiantes na qualidade dos nossos serviços, e é por isso
                    que garantimos sua total satisfação com a grantia tecnomade. Se, por qualquer motivo, você não
                    estiver completamente satisfeito com a contratação dos serviços, estamos prontos para oferecer um
                    reembolso rápido e sem complicações.</p>
            </div>

            <div>
                <img src="https://img.freepik.com/fotos-premium/dois-homens-apertando-as-maos-de-um-vestindo-um-terno-que-diz-a-palavra_900958-16992.jpg?w=740"
                    alt="imagem_impressionante_que_passa_segurança" class="img_security_garantia_aperto">
                <img src="./imgs/garantia_segurança_tecno.png" alt="icon_segurança"
                    class="img_garantia_segurança_tecno">
            </div>



        </section>

        <div class="title_section_for">
            <h3>Perfils de alguns profissionais excepcionais</h3>
        </div>


        <section>
            <div class="cap_shadow">
                <a href="paginaDeServicosParaPrestador.php" class="button_ver_mais">Ver mais</a>
            </div>
            <div class="container_recommendations">
                <div class="bloco_titulo_recomendação">
                    <h2>Quem contratou na Tecnomade recomenda</h2>
                    <h3>Incontáveis clientes satisfeitos e com seus problemas resolvidos</h3>
                </div>
                <div class="conteiner_comentario_recomendacao">

                    <div class="bloco_comentario_recomendacao">
                        <img src="./imgs/icons8-aspa-48.png" class="img_comentario_aspas">
                        <blockquote>
                            <p><em>Fui muito bem atendida, o profissional foi muito educado e fez um trabalho de
                                    qualidade. Valeu a pena, orçamento grátis e não é careiro.</em></p>
                            <p>
                                <strong>Serviço de Desenvolvimento </strong><span>Ana Paula Contratou um Desenvolvedor
                                    em São
                                    Paulo, SP</span>
                            </p>
                        </blockquote>
                    </div>


                    <div class="bloco_comentario_recomendacao">
                        <img src="./imgs/icons8-aspa-48.png" class="img_comentario_aspas">
                        <blockquote>
                            <p><em> O rapaz é bem empenhado, conseguiu resolver meu problema. Tudo o que é pedido
                                    é feito da maneira como foi pedido. Aprovado!</em></p>
                            <p><strong>Serviço de Assistência Tecnica </strong><span>Bruno Freitas Contratou um
                                    assistente Tecnico em Curitiba, PR</span></p>
                        </blockquote>
                    </div>


                    <div class="bloco_comentario_recomendacao">
                        <img src="./imgs/icons8-aspa-48.png" class="img_comentario_aspas">
                        <blockquote>
                            <p><em>Um excelente profissional, pontual e acima de tudo muito confiável. Foi bastante
                                    educado e atencioso com o trabalho, recomendo.</em></p>
                            <p><strong>Serviço de Assistência Tecnica
                                </strong><span> Renata Figueiredo Contratou um assistente Tecnico em Rio de Janeiro, RJ</span></p>
                        </blockquote>
                    </div>

                </div>
            </div>
        </section>

        <section class="conteiner_sobrenos_">

            <div class="content_carrosel">

                <main class="main-content">
                    <div class="carrossel">
                        <div class="imagem-carrossel" style="display: none;">
                            <img src="./imgs/94fc8053-be89-4fe5-9ab3-dc331c8ba566.jpg" alt="imagem 1" class="fotus">
                            <img src="./imgs/f8398c6b-1913-4d1a-be43-598a4ff5e754.jpg"
                                class="tecnomade_logo_in_carrossel">
                        </div>
                        <div class="imagem-carrossel" style="display: none;">
                            <img src="./imgs/img_team_tecnomade.jpeg" alt="imagem 2" class="fotus">
                        </div>
                        <div class="imagem-carrossel" style="display: none;">
                            <img src="./imgs/img_team_tecnomade_self.jpeg" alt="imagem 3" class="fotus">
                        </div>

                        <button class="botao-direito" id="icon_carrossel">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"
                                fill="rgb(0, 128, 111)" id="icon_carrossel_Color">
                                <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
                            </svg>
                        </button>

                        <button class="botao-esquerdo" id="icon_carrossel2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"
                                class="icon_carrossel_esquerdo" fill="rgb(0, 128, 111)" id="icon_carrossel_Color2">
                                <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
                            </svg>
                        </button>

                        <div class="indicadores">
                            <span class="indicador"></span>
                            <span class="indicador ativo"></span>
                            <span class="indicador"></span>
                        </div>

                    </div>
                </main>
            </div>

            <div class="box_text_story">
                <h3>Um poucou sobre nossa história</h3>
                <div class="container_story-text">
                    <p>A Tecnomade Services foi criada em 2023, visando trazer um diferencial entre as plataforma de
                        busca por serviço técnico no brasil, oferecendo ferramentas que incetivam a interação,
                        comunicação e consequentemente um vínculo entre o cliente e o prestador de serviços.

                        Se conectar com outras pessoas, criar laços e mantê-los vivos são fundamentos cruciais para a
                        longevidade e desenvolvimento em cada aspecto da plataforma.</p>
                </div>
                <button class="btn-saiba_more_story" onclick="location.href='sobrePf.php'">saiba mais</button>

            </div>

        </section>

        <section class="conteiner_FAQ_duvida ">


            <div class="faq">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="section-title_text-center">
                                <h2>FAQ</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="accordion" id="accordionExample">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        Posso cancelar minha assinatura quando quiser ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Sim, você pode cancelar sua assinatura a qualquer momento. Para cancelar, entre em contato com a nossa equipe de atendimento ao cliente e informe o motivo do cancelamento
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Quais são as opções de pagamento ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                aceitem pagamentos por cartão de crédito, débito, transferência bancária, e PIX.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        É possível obter reembolso em caso de insatisfação ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Se, por qualquer motivo, você não estiver completamente satisfeito com a contratação dos serviços, estamos prontos para oferecer um reembolso.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse4"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Quanto tempo leva para receber suporte ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Nosso time de atendimento ao cliente está disponível para ajudá-lo de segunda a sexta-feira, das 8h às 17h (horário de Brasília). Você pode entrar em contato com nosso suporte através do chat ou do telefone.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse5"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        O que fazer se eu esquecer minha senha de acesso ?
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Se você esquecer sua senha, entre em contato com a nossa equipe de atendimento ao cliente e informe seu e-mail de registro para que possamos ajudá-lo a recuperar a senha.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse6"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Como posso renovar minha assinatura ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse6" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Para renovar sua assinatura, entre em contato com a nossa equipe de atendimento ao cliente e informe que deseja renovar o plano.                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse7"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Minha privacidade está segura ?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse7" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                Sim, nós valorizamos a privacidade de nossos clientes e seguimos as melhores práticas de segurança para proteger seus dados pessoais.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse8"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Preciso ter CNPJ para trabalhar com a plataforma?
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse8" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                é necessário possuir um CNPJ somente em caso que você tenha uma Assistência Tecnica ou uma empresas. O registro do CNPJ permite comprovar a legalidade e a regularidade do seu negócio, além de fornecer uma base sólida para estabelecer relações comerciais confiáveis. No entanto, se você é um profissional autônomo ou freelancer, não é obrigatório ter um CNPJ para começar a utilizar nossa plataforma.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>


        <button id="btnTopo" onclick="scrollToTop()" style="display: block;" title="retorne ao topo">

            <svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="30px" height="30px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve">
                <g>
                    <path class="arrow_icon_bnt_top" d="M52,83.999V21.655l21.172,21.172c1.562,1.562,4.094,1.562,5.656,0c1.562-1.562,1.562-4.095,0-5.657l-28-28
            c-1.562-1.562-4.095-1.562-5.656,0l-28,28C16.391,37.951,16,38.974,16,39.999c0,1.023,0.391,2.047,1.172,2.828
            c1.562,1.562,4.095,1.562,5.656,0L44,21.655v62.344c0,2.209,1.791,4,4,4S52,86.208,52,83.999z" />
                </g>
            </svg>

        </button>


        <div class="floating-chat">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <div class="chat">
                <div class="header_chat">
                    <img src="./imgs/img_pf_chatbot_tec.png"
                        class="img_perfil_tecnobot">
                    <span class="title_tecnobot">
                        Tec The Ghost ^^
                    </span>
                    <button class="btn_fechar_chat">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>

                </div>
                <ul class="messages">
                    <!-- <li class="self">Olá, preciso de ajuda. </li> -->
                    <li class="other msg"><img
                            src="./imgs/img_pf_chatbot_tec.png"
                            class="img_perfil_tecnobot_chat">Olá, Eu sou o Tec, o fantasma.</li>
                    <li class="other msg"><img
                            src="./imgs/img_pf_chatbot_tec.png"
                            style="top: 32px;" class="img_perfil_tecnobot_chat"> Em que posso te ajuda?<br> O que
                        precisa saber?</li>
                </ul>
                <div class="footer">
                    <div class="text-box" contenteditable="true" disabled="true"></div>
                    <button id="sendMessage"><svg data-name="Layer 45" height="25" id="Layer_45" viewBox="0 0 24 24"
                            width="25" xmlns="http://www.w3.org/2000/svg">
                            <title />
                            <polygon class="color_icon" points="10.854 15.264 9 17.455 9 21 19 8 10.854 15.264"
                                style="fill:rgb(0,128,111)" />
                            <polygon class="color_icon"
                                points="3 12 8.607 14.99 8.613 14.99 17 8 10.775 15.357 12 16.781 18 20 21 3 3 12"
                                style="fill: rgb(0, 128, 111)" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
    <script src="./js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./js/scriptsIndex.js"></script>
    <script> 

    document.querySelector("redirecPorti").addEventListener("click",  function(){
        window.location.href = "portifolio.php";
    });

    </script>


    <?php
    include_once('footer.php');
    ?>
</body>

</html>