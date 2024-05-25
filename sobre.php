<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <link rel="stylesheet" href="./css/style_about.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/chatbot1.css">
    <link rel="stylesheet" href="./css/chatbot.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
<style>

.cardClient {
  background: url("./imgs/fd_card_perfil.gif")!important;
  background-size: cover;
}

</style>
    
    <title>Sobre nós</title>
</head>

<body>

<?php
session_start();
if(isset($_SESSION['pfLogado'])){
    require_once "navPf.php";
}elseif(isset($_SESSION['usrLogado'])){
    require_once "navUsr.php";
}else{
    require_once "navHome.php";
}
?>

    <section class="section_ini_abouts">

        <div class="title_ini_about_Stec">
            <img src="./imgs/logo_white_png.png" class="img_title_lg">
            <h2 class="text_exe_ini_sobre_tt">Sobre a Tecnomade</h2>
        </div>
        <div class="content_text_sobre">
            <div class="text_exe_ini_sobre">
                <h2><span class="title_bold">Quem</span><br> Somos ?</h2>
                <p>Somos mais do que uma equipe de especialistas em tecnologia, somos catalisadores de transformação digital. Nosso DNA é composto por inovação, expertise e um compromisso inabalável com o sucesso dos nossos clientes e profissionais. Através de uma abordagem centrada no cliente e na excelência técnica, buscamos não apenas resolver problemas, mas também impulsionar o crescimento e a inovação em todas as interações.</p>
            </div>
            <div class="text_exe_ini_sobre">
                <h2><span class="title_bold">O que</span><br> fazemos ?</h2>
                <p>A Tecnomade atua como um intermediário confiável, facilitando a conexão entre aqueles que precisam de assistência tecnológica e os especialistas em TI qualificados. Seja você um usuário doméstico que enfrenta dificuldades com seu computador pessoal, um empreendedor buscando soluções para integrar tecnologia em seu negócio, Tecnomade está aqui para ajudar.</p>
            </div>
            <div class="text_exe_ini_sobre">
                <h2><span class="title_bold">Como</span><br> Associar ?</h2>
                <p>Associar-se à Tecnomade é fácil e rápido. Basta preencher nosso formulário de cadastro, onde você criará seu perfil profissional,  aceitará nossos termos, especificará quais são as fuções que você executa. Após uma breve revisão, você será oficialmente parte de nossa equipe, pronta para oferecer seus serviços de TI e ajudar usuários a superar desafios tecnológicos.</p>
            </div>
        </div>        
    </section>

    <section>

        <div class="conteiner_sobrenos_carrossel">

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
                    <div class="imagem-carrossel" style="display: none;">
                        <img src="./imgs/equipetec.jpeg" alt="imagem 4" class="fotus">
                    </div>
                    <div class="imagem-carrossel" style="display: none;">
                        <img src="./imgs/colabTecnoAndAni.jpeg" alt="imagem 5" class="fotus">
                    </div>
                    <div class="imagem-carrossel" style="display: none;">
                        <img src="./imgs/todosjuntos.jpeg" alt="imagem 6" class="fotus">
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
                        <span class="indicador"></span>
                        <span class="indicador"></span>
                        <span class="indicador"></span>
                    </div>

                </div>
            </main>
        </div>
    </section>

    <hr class="custom-hr ">
    <section class="section_nossa_historia">
        <div>
            <h2 class="title_nossa_historia"><b>Nossa história</b></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo deleniti sunt nesciunt molestias possimus, reiciendis libero temporibus harum quae facilis quos accusantium itaque nam quod ipsa! Ex quod exercitationem voluptatum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="imgs_container_localetec"> 
            <img src="https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/etec-itaquaquecetuba.jpg" class="img_etec_about_us">
            <!-- <img src="./imgs/localEtec.jpg" class="img_localizacao_etec"> -->
        </div>      
    </section>
    <hr class="custom-hr ">

    <section class="section_expli_name"> 
<img src="https://t3.ftcdn.net/jpg/06/88/48/08/240_F_688480862_jnUnXxLjRW7Lma1IR12KkSlOAtdya4HZ.jpg" class="img_palavras_signi">
        <div>
            <h2 class="pqnameTecnomade_tt">Porque o nome " Tecnomade " ?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo deleniti sunt nesciunt molestias possimus, reiciendis libero temporibus harum quae facilis quos accusantium itaque nam quod ipsa! Ex quod exercitationem voluptatum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </section>

    <section class="section_sobre_logo"> 
        <div class="bloco_text_expli_logo_colors">
            <h2>Logo e as cores</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo deleniti sunt nesciunt molestias possimus, reiciendis libero temporibus harum quae facilis quos accusantium itaque nam quod ipsa! Ex quod exercitationem voluptatum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsam, maiores tempore magni dolorum vitae eum ipsum voluptatibus natus, doloremque libero? Delectus sequi minima cumque quae ipsa! Nostrum, tempore et. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed temporibus dolorum, eaque, fuga labore expedita neque, id praesentium nostrum vitae eius doloribus optio reprehenderit quaerat laborum. Consequuntur nam maxime vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="bx_imgs_balls">

            <div class="_ball"><img src="./imgs/94ca950a-925e-4478-9163-33692059ce7e.jpg" alt="logoTecnomade"
                class="img_logo_tecnomade_about"></div>
            <div class="_ball1"></div>
            <div class="_ball2"></div>
            <div class="_ball3"></div>
            <div class="_ball4"></div>
            <div class="_ball5"></div>
      </div>
    </section>


    <section class="section_nossos_valores">
        <h2 title="title_nossos_valores">Nossos Valores</h2>

        <ul class="list_valores_about_us">


        <p class="titulo_topico_list_value">TRANSPARÊNCIA É PRIMORDIAL</p>
        <li>
            <p>A plataforma é transparente e transparente é essencial para o bom relacionamento entre o usuário e o cliente.</p>
        </li>
        <p class="titulo_topico_list_value">COMUNICAÇÃO É PRIORIDADE </p>
        <li>
            <p>Oferecer ferramentas que torna o relacionamento entre o usuário e o cliente mais claro e profundo.</p>
        </li>
        <p class="titulo_topico_list_value">RAPIDEZ É ESSENCIAL</p>
        <li>
            <p>A plataforma visa velocidade e praticidade no momento que o usuário busca contratar seu serviço.</p>
        </li>
        <p class="titulo_topico_list_value">QUALIDADE É NECESSÁRIO</p>
        <li>
            <p>Todos os técnicos que ingressam na plataforma passam por uma verificação para assegurar a qualidade dos serviços propostos.</p>
        </li>
        </ul>
    </section>

    <section class="section_detalhes_sobre_membros">
        <h2> Nossa Equipe</h2>
        <a name="perfilGabriela"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_img_sobre_membros">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil">
            </div>
            <div class="box_detalhes_membro">
                <p class="nome_membro">Gabriela Duccin<br><span class="especialdade_membro">Designer</span></p>
                
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem numquam laudantium voluptates expedita distinctio repellat atque id. Officiis repellendus tempora quaerat provident! Earum quaerat temporibus, impedit culpa sit ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum iste est officiis explicabo, autem excepturi neque libero quod. Consequuntur odio eaque sint iusto inventore, nemo soluta itaque? Dolore, praesentium quaerat?
                Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non. Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non.</p>
            </div>
        </div>
        <a name="perfilJailson"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_detalhes_membro ">
                <p class="nome_membro">Jailson B. Silva<br><span class="especialdade_membro"> Desenvolvedor FullStack</span></p>
                <p>Olá! Seja bem-vindo(a) à nossa plataforma. Me chamo Jailson, prazer em conhecê-lo. Sou um dos desenvolvedores da Tecnomade, encarregado tanto da parte front-end quanto do back-end. Como desenvolvedor, minha função é criar e manter a estrutura e funcionalidades do sistema, garantindo uma experiência fluida e intuitiva para os usuários. No front-end, trabalho na interface com o usuário, desenvolvendo o layout, design e interatividade da plataforma. Já no back-end, lido com a lógica e o funcionamento do sistema, cuidando da segurança dos dados e da eficiência das operações. É uma jornada desafiadora, mas extremamente gratificante, poder contribuir para a evolução tecnológica da nossa empresa e proporcionar soluções inovadoras aos nossos usuários. Gosto bastante de desenvolvimento, gosto ainda mais se eu estiver escutando música enquanto desenvolvo ツ .</p>
                
            </div>
            
            <div class="box_img_sobre_membros ajst_margin_dt_mbo">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil ">
            </div>
            
        </div>
        <a name="perfilLeonardo"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_img_sobre_membros">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil">
            </div>
            <div class="box_detalhes_membro">
                <p class="nome_membro">Leonardo<br><span class="especialdade_membro">Diretor de projetos</span></p>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem numquam laudantium voluptates expedita distinctio repellat atque id. Officiis repellendus tempora quaerat provident! Earum quaerat temporibus, impedit culpa sit ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum iste est officiis explicabo, autem excepturi neque libero quod. Consequuntur odio eaque sint iusto inventore, nemo soluta itaque? Dolore, praesentium quaerat?
                    Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non. Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non.</p>
            </div>
        </div>
        <a name="perfilLuiz"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_detalhes_membro ">
                <p class="nome_membro">Luiz Jorge<br><span class="especialdade_membro">Designer</span></p>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem numquam laudantium voluptates expedita distinctio repellat atque id. Officiis repellendus tempora quaerat provident! Earum quaerat temporibus, impedit culpa sit ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum iste est officiis explicabo, autem excepturi neque libero quod. Consequuntur odio eaque sint iusto inventore, nemo soluta itaque? Dolore, praesentium quaerat?
                Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non. Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non.</p>
            </div>
            
            <div class="box_img_sobre_membros ajst_margin_dt_mbo">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil ">
            </div>
            
        </div>

        <a name="perfilRafael"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_img_sobre_membros">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil">
            </div>
            <div class="box_detalhes_membro">
                <p class="nome_membro">Rafael Bezerrati<br><span class="especialdade_membro">analista de testes</span></p>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem numquam laudantium voluptates expedita distinctio repellat atque id. Officiis repellendus tempora quaerat provident! Earum quaerat temporibus, impedit culpa sit ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum iste est officiis explicabo, autem excepturi neque libero quod. Consequuntur odio eaque sint iusto inventore, nemo soluta itaque? Dolore, praesentium quaerat?
                    Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non. Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non.</p>
            </div>
        </div>

        <a name="perfilSheno"></a>
        <div class="bloco_detalhes_membro_team">
            <div class="box_detalhes_membro ">
                <p class="nome_membro">Sheno Carvalho<br><span class="especialdade_membro">Desenvolvedor Back-end / DBA</span></p>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quidem numquam laudantium voluptates expedita distinctio repellat atque id. Officiis repellendus tempora quaerat provident! Earum quaerat temporibus, impedit culpa sit ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum iste est officiis explicabo, autem excepturi neque libero quod. Consequuntur odio eaque sint iusto inventore, nemo soluta itaque? Dolore, praesentium quaerat?
                Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non. Sunt, minima. Perspiciatis, non. Cumque suscipit nostrum recusandae facilis repellat temporibus quas explicabo, at animi corrupti eveniet. Voluptas temporibus quisquam quas veniam aperiam eligendi quos enim! Hic inventore quo non.</p>
            </div>
            
            <div class="box_img_sobre_membros ajst_margin_dt_mbo">
                <img src="https://imagens.net.br/wp-content/uploads/2023/07/fotos-tristes-para-perfil-do-whatsapp-feminino-36.jpg" class="dt_img_perfil ">
            </div>
            
        </div>
        
    </section>






   
    <section class="section_team_tecnomade_about_us">
        <h2 class="title_team_tecnomade_about_us"><b>Rede sociais da Equipe</b></h2>

        <div class="container_team">
            <div class="cardClient" onclick="RedpfG()">
                <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                <p class="name-client"> Gabriela Duccini
                    <span>Designer 
                    </span>
                </p>
                <div class="social-media">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <span class="tooltip-social">Twitter</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <span class="tooltip-social">Instagram</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                        </svg>
                        <span class="tooltip-social">Facebook</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                        </svg>
                        <span class="tooltip-social">LinkedIn</span>
                    </a>
                </div>
            </div>
            <div class="container_team">
                <div class="cardClient" onclick="RedpfJ()">
                    <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                    <p class="name-client"> Jailson B. Silva
                        <span>Desenvolvedor
                        </span>
                    </p>
                    <div class="social-media">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                            <span class="tooltip-social">Twitter</span>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                            </svg>
                            <span class="tooltip-social">Instagram</span>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                            </svg>
                            <span class="tooltip-social">Facebook</span>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                            </svg>
                            <span class="tooltip-social">LinkedIn</span>
                        </a>
                    </div>
                </div>
        
        <div class="container_team">
            <div class="cardClient" onclick="RedpfL()">
                <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                <p class="name-client"> Leonardo
                    <span>Diretor de projetos
                    </span>
                </p>
                <div class="social-media">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <span class="tooltip-social">Twitter</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <span class="tooltip-social">Instagram</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                        </svg>
                        <span class="tooltip-social">Facebook</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                        </svg>
                        <span class="tooltip-social">LinkedIn</span>
                    </a>
                </div>
            </div>
        <div class="container_team">
            <div class="cardClient" onclick="RedpfLu()">
                <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                <p class="name-client"> Luiz Jorge
                    <span>Designer 
                    </span>
                </p>
                <div class="social-media">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <span class="tooltip-social">Twitter</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <span class="tooltip-social">Instagram</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                        </svg>
                        <span class="tooltip-social">Facebook</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                        </svg>
                        <span class="tooltip-social">LinkedIn</span>
                    </a>
                </div>
            </div>
        <div class="container_team">
            <div class="cardClient" onclick="RedpfR()">
                <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                <p class="name-client"> Rafael Bezerrati
                    <span>analista de testes
                    </span>
                </p>
                <div class="social-media">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <span class="tooltip-social">Twitter</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <span class="tooltip-social">Instagram</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                        </svg>
                        <span class="tooltip-social">Facebook</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                        </svg>
                        <span class="tooltip-social">LinkedIn</span>
                    </a>
                </div>
            </div>
        <div class="container_team">
            <div class="cardClient" onclick="RedpfS()">
                <img src="https://t2.tudocdn.net/319406?w=824&h=494" class="foto_perfil_membro">
                <p class="name-client"> Sheno Carvalho
                    <span>Desenvolvedor
                    </span>
                </p>
                <div class="social-media">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <span class="tooltip-social">Twitter</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <span class="tooltip-social">Instagram</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                        </svg>
                        <span class="tooltip-social">Facebook</span>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                        </svg>
                        <span class="tooltip-social">LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
   

    
  <section class="sectionTwoAboutUs">

 <h2>Entre em contato ou siga <br> Tecnomade 
  pelas redes sociais também</h2>

<div class="redesSociaisAboutUs">
  <img class="iconsNtSociais linkedIn" src="./imgs/linkedin_icon.png" alt="linkedin_icon" title="LinkedIn" />
  <svg style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" class="iconsNtSociais instagram" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="white" d="M256,0c141.29,0 256,114.71 256,256c0,141.29 -114.71,256 -256,256c-141.29,0 -256,-114.71 -256,-256c0,-141.29 114.71,-256 256,-256Zm0,96c-43.453,0 -48.902,0.184 -65.968,0.963c-17.03,0.777 -28.661,3.482 -38.839,7.437c-10.521,4.089 -19.444,9.56 -28.339,18.455c-8.895,8.895 -14.366,17.818 -18.455,28.339c-3.955,10.177 -6.659,21.808 -7.437,38.838c-0.778,17.066 -0.962,22.515 -0.962,65.968c0,43.453 0.184,48.902 0.962,65.968c0.778,17.03 3.482,28.661 7.437,38.838c4.089,10.521 9.56,19.444 18.455,28.34c8.895,8.895 17.818,14.366 28.339,18.455c10.178,3.954 21.809,6.659 38.839,7.436c17.066,0.779 22.515,0.963 65.968,0.963c43.453,0 48.902,-0.184 65.968,-0.963c17.03,-0.777 28.661,-3.482 38.838,-7.436c10.521,-4.089 19.444,-9.56 28.34,-18.455c8.895,-8.896 14.366,-17.819 18.455,-28.34c3.954,-10.177 6.659,-21.808 7.436,-38.838c0.779,-17.066 0.963,-22.515 0.963,-65.968c0,-43.453 -0.184,-48.902 -0.963,-65.968c-0.777,-17.03 -3.482,-28.661 -7.436,-38.838c-4.089,-10.521 -9.56,-19.444 -18.455,-28.339c-8.896,-8.895 -17.819,-14.366 -28.34,-18.455c-10.177,-3.955 -21.808,-6.66 -38.838,-7.437c-17.066,-0.779 -22.515,-0.963 -65.968,-0.963Zm0,28.829c42.722,0 47.782,0.163 64.654,0.933c15.6,0.712 24.071,3.318 29.709,5.509c7.469,2.902 12.799,6.37 18.397,11.969c5.6,5.598 9.067,10.929 11.969,18.397c2.191,5.638 4.798,14.109 5.509,29.709c0.77,16.872 0.933,21.932 0.933,64.654c0,42.722 -0.163,47.782 -0.933,64.654c-0.711,15.6 -3.318,24.071 -5.509,29.709c-2.902,7.469 -6.369,12.799 -11.969,18.397c-5.598,5.6 -10.928,9.067 -18.397,11.969c-5.638,2.191 -14.109,4.798 -29.709,5.509c-16.869,0.77 -21.929,0.933 -64.654,0.933c-42.725,0 -47.784,-0.163 -64.654,-0.933c-15.6,-0.711 -24.071,-3.318 -29.709,-5.509c-7.469,-2.902 -12.799,-6.369 -18.398,-11.969c-5.599,-5.598 -9.066,-10.928 -11.968,-18.397c-2.191,-5.638 -4.798,-14.109 -5.51,-29.709c-0.77,-16.872 -0.932,-21.932 -0.932,-64.654c0,-42.722 0.162,-47.782 0.932,-64.654c0.712,-15.6 3.319,-24.071 5.51,-29.709c2.902,-7.468 6.369,-12.799 11.968,-18.397c5.599,-5.599 10.929,-9.067 18.398,-11.969c5.638,-2.191 14.109,-4.797 29.709,-5.509c16.872,-0.77 21.932,-0.933 64.654,-0.933Zm0,49.009c-45.377,0 -82.162,36.785 -82.162,82.162c0,45.377 36.785,82.162 82.162,82.162c45.377,0 82.162,-36.785 82.162,-82.162c0,-45.377 -36.785,-82.162 -82.162,-82.162Zm0,135.495c-29.455,0 -53.333,-23.878 -53.333,-53.333c0,-29.455 23.878,-53.333 53.333,-53.333c29.455,0 53.333,23.878 53.333,53.333c0,29.455 -23.878,53.333 -53.333,53.333Zm104.609,-138.741c0,10.604 -8.597,19.199 -19.201,19.199c-10.603,0 -19.199,-8.595 -19.199,-19.199c0,-10.604 8.596,-19.2 19.199,-19.2c10.604,0 19.201,8.596 19.201,19.2Z"/></svg>

    <svg version="1.1" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink" class="iconsNtSociais facebook"><path d="M30,60 C46.5685433,60 60,46.5685433 60,30 C60,13.4314567 46.5685433,0 30,0 C13.4314567,0 0,13.4314567 0,30 C0,46.5685433 13.4314567,60 30,60 Z" fill="#000000" id="Facebook"/><path d="M25.4622239,47.314313 L25.4622239,29.9989613 L21.9432889,29.9989612 L21.9432889,24.2593563 L25.4622239,24.2593563 L25.4622239,20.7883864 C25.4622239,16.1066422 26.8619948,12.730619 31.9881023,12.730619 L38.0863595,12.730619 L38.0863595,18.45844 L33.7922546,18.45844 C31.6418944,18.45844 31.1518737,19.8873763 31.1518737,21.3837609 L31.1518737,24.2593553 L37.7694231,24.2593558 L36.8661728,29.9989613 L31.1518737,29.9989613 L31.1518737,47.3143123 L25.4622239,47.314313 Z" fill="#FFFFFF"/></svg>

   <svg enable-background="new 0 0 32 32" id="Layer_1" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="iconsNtSociais whatsapp"><g  fill="white" id="OUTLINE_copy_2"><g><g><path fill="white" d="M16,0C7.163,0,0,7.163,0,16s7.163,16,16,16c8.836,0,16-7.164,16-16S24.837,0,16,0z M16.008,24.004     c-1.536,0-2.984-0.384-4.257-1.047l-4.988,2.27l1.396-5.586c-0.872-1.414-1.396-3.09-1.396-4.887     c0-5.096,4.134-9.233,9.246-9.233c5.093,0,9.228,4.137,9.228,9.233C25.236,19.867,21.102,24.004,16.008,24.004z"/></g><g><path d="M16.008,7.371c-4.083,0-7.397,3.299-7.397,7.383c0,1.85,0.681,3.543,1.797,4.835l-1.012,2.566l2.251-1.431     c1.22,0.907,2.721,1.431,4.361,1.431c4.082,0,7.379-3.316,7.379-7.4C23.387,10.67,20.09,7.371,16.008,7.371z M20.684,17.842     c-0.07,0.366-0.942,1.152-1.623,1.309c-1.465,0.331-3.541-0.838-4.885-2.076c-1.344-1.221-2.686-3.194-2.494-4.678     c0.087-0.681,0.802-1.623,1.151-1.745c0.157-0.035,0.383-0.035,0.593-0.035c0.244,0.017,0.454,0.035,0.524,0.174l0.785,2.042     c0.052,0.157-0.07,0.331-0.227,0.524c-0.226,0.262-0.261,0.279-0.471,0.559c-0.104,0.139-0.035,0.314,0,0.383     c0.227,0.541,0.75,1.152,1.221,1.588c0.489,0.437,1.133,0.908,1.692,1.099c0.035,0,0.244,0.087,0.401,0.052     c0.139-0.017,0.226-0.122,0.348-0.279c0.226-0.279,0.314-0.384,0.506-0.646c0.157-0.192,0.313-0.262,0.472-0.175l1.779,0.821     c0.14,0.07,0.192,0.244,0.209,0.489C20.701,17.459,20.719,17.686,20.684,17.842z"/></g></g></g></svg>

    <img class="iconsNtSociais twitter" src="./imgs/twitter_logo_icon.jpg" alt="Twitter_icon" title="Twitter">
  <img class="iconsNtSociais git" src="./imgs/icogithub.png" alt="icogithub" title="GitHub">
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
                    <img src="https://i.pinimg.com/236x/2c/67/f0/2c67f0796ef5bf73654c7429a0ce082e.jpg"
                        class="img_perfil_tecnobot">
                    <span class="title_tecnobot">
                        OSvaldo_Tecnobot v1_test
                    </span>
                    <button class="btn_fechar_chat">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>

                </div>
                <ul class="messages">
                    <!-- <li class="self">Olá, preciso de ajuda. </li> -->
                    <li class="other msg"><img
                            src="https://i.pinimg.com/236x/2c/67/f0/2c67f0796ef5bf73654c7429a0ce082e.jpg"
                            class="img_perfil_tecnobot_chat"> Olá, eu sou o batman. fdp</li>
                    <li class="other msg"><img
                            src="https://i.pinimg.com/236x/2c/67/f0/2c67f0796ef5bf73654c7429a0ce082e.jpg"
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

<?php
    require_once './footer.php';
?>

    <script src="./js/scriptsIndex.js"></script>
    <script src="./js/script.js"></script>

    <script>
        function RedpfJ(){ location.href="#perfilJailson"};
        function RedpfG(){ location.href="#perfilGabriela"};
        function RedpfL(){ location.href="#perfilLeonardo"};
        function RedpfLu(){ location.href="#perfilLuiz"};
        function RedpfR(){ location.href="#perfilRafael"};
        function RedpfS(){ location.href="#perfilSheno"};
    </script>

</body>

</html>