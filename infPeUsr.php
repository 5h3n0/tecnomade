<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'connect.php';

if (!isset($_SESSION['id_Usr'])) {
    die("Vc precisa estar logado para ver esta página.");
}

$id_Usr = $_SESSION['id_Usr'];

$sql = "
    SELECT users.usrName, users.dtNasUsr, users.email, users.imgName, enderecos.cidade 
    FROM users 
    LEFT JOIN enderecos ON users.id_Usr = enderecos.id_Usr 
    WHERE users.id_Usr = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_Usr);
$stmt->execute();
$result = $stmt->get_result();

$profile = $result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/style_infPePf.css">
    <title>Dados</title>

    <style>
        .background_card{
            background: linear-gradient(90deg, black 50%, transparent), url(./imgs/1110251_Animation_Envelope_Glow_1280x720.gif);
        }  
    </style>

</head>

<body>
    <?php
    include_once('navUsr.php');
    ?>
    <br>
    <br>
    <br>
    <br>
    
    <div class="container">
        <main>
            <section class="card background_card" style="margin: 50px 0 0 0;">
                <?php
                if ($profile) {
                    $dataNsc = $profile['dtNasUsr'];
                    $dataNscFormat = date('d/m/Y', strtotime($dataNsc));
                    
                    echo '<div class="profile-card">';
                    echo '<div class="box_img_sobre_membros">';
                    
                    if (!empty($profile['imgName'])) {
                        $imgUsr = "upload/" . $profile['imgName'];
                        echo "<img src='$imgUsr' alt='Imagem do Usuário' class='imgPf'><br><br>";
                    } else {
                        echo "<img src='./imgs/user.png' alt='Imagem do Usuário' class='imgPf sem_foto'><br><br>";
                    }
                    
                    echo '</div>';
                    echo '<div>';
                    echo '<h2>' . htmlspecialchars($profile['usrName']) . '</h2>';
                    echo '<p>Email: ' . htmlspecialchars($profile['email']) . '</p>';
                    echo '<p>Data de Nascimento: ' . htmlspecialchars($dataNscFormat) . '</p>';
                    echo '<p>Cidade: ' . htmlspecialchars($profile['cidade']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<p>Perfil não encontrado.</p>';
                }
                ?>
            </section>

    <aside class="sidebar">
                <h1>Gerencie Sua Conta</h1>
                <p>Explore as opções abaixo para atualizar seus dados, proteger sua conta e mais.</p>
                <ul>
                    <li><a href="perfilUsr.php">Perfil</a></li>
                    <li><a href="updatePassUsr.php">Alterar Senha</a></li>
                    <li><a href="deleteUsr.php">Excluir conta</a></li>
                </ul>
                <p> Manter suas informações atualizadas não apenas facilita sua experiência conosco, mas também ajuda a prevenir fraudes e acessos não autorizados. A qualquer momento, você pode revisar suas configurações de segurança e fazer os ajustes necessários para manter seu perfil seguro e em conformidade com nossas políticas de privacidade.</p>
            </aside>

            <section class="card" id="alterar-senha">
                <img src="./imgs/0x0.jpg">
                <h2>Alterar Senha</h2>
                <p>Alterar sua senha regularmente é uma das melhores práticas para manter sua conta segura. A senha é a primeira linha de defesa contra acessos não autorizados e, por isso, deve ser forte e única. Nesta seção, você pode facilmente atualizar sua senha, garantindo que somente você tenha acesso à sua conta. Recomendamos que sua nova senha tenha pelo menos oito caracteres, incluindo uma combinação de letras maiúsculas e minúsculas, números e símbolos. Evite usar senhas óbvias ou fáceis de adivinhar, como datas de aniversário ou sequências numéricas simples. Além disso, é uma boa prática não reutilizar senhas de outros sites ou serviços. Após alterar sua senha, certifique-se de armazená-la em um local seguro e considere o uso de um gerenciador de senhas para mantê-la protegida. Lembre-se de que a segurança da sua conta é uma responsabilidade compartilhada, e manter suas credenciais seguras ajuda a proteger não apenas suas informações, mas também a integridade de toda a nossa plataforma. <a href="updatePassUsr.php">Redefinir Senha.</a></p>
                <img src="./imgs/escudo-de-seguranca.png" class="escudo_floting">
                <img src="./imgs/key1.png" class="key_move">
            </section>
            <section class="card" id="excluir-conta">
                <img src="./imgs/Limpeza-de-dados-5-boas-praticas-para-fazer-na-sua-empresa.jpg" >
                <h2>Excluir conta</h2>
                <p>
                    Atenção! A exclusão da sua conta é uma ação permanente e irreversível. Ao optar por excluir sua conta, todos os seus dados serão apagados de nosso sistema, incluindo informações pessoais, dados de pagamento, histórico de serviços e qualquer outro dado associado ao seu perfil. Esta ação não pode ser desfeita, e não haverá possibilidade de recuperar sua conta ou os dados uma vez que a exclusão seja confirmada. <a href="#" id="deleteAccountBtn"> Excluir conta</a>
                </p>
                <img src="./imgs/reject_11724657.png" class="laystall_floting">

                <div id="confirmModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Tem certeza que deseja excluir sua conta?</h2>
                        <p>
                            Esta ação é permanente e não pode ser desfeita. Ao confirmar a exclusão, todos os seus dados serão apagados de nosso sistema. Isso inclui:
                            <ul>
                                <li>Informações de perfil</li>
                                <li>Histórico de serviços</li>
                                <li>Dados de pagamento</li>
                                <li>Qualquer outro dado associado à sua conta</li>
                            </ul>
                        </p>
                        <p>
                            Por favor, confirme sua decisão. Se você está certo de que deseja prosseguir, clique em "Sim, excluir minha conta". Caso contrário, clique em "Cancelar" para voltar.
                        </p>
                        <button id="confirmDelete">Sim, excluir minha conta</button>
                        <button id="cancelDelete">Cancelar</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("confirmModal");
            var btn = document.getElementById("deleteAccountBtn");
            var span = document.getElementsByClassName("close")[0];
            var cancelBtn = document.getElementById("cancelDelete");
            var confirmBtn = document.getElementById("confirmDelete");

            if (btn) {
                btn.onclick = function() {
                    modal.style.display = "block";
                }
            }

            if (span) {
                span.onclick = function() {
                    modal.style.display = "none";
                }
            }

            if (cancelBtn) {
                cancelBtn.onclick = function() {
                    modal.style.display = "none";
                }
            }

            if (confirmBtn) {
                confirmBtn.onclick = function() {
                    // Aqui você pode adicionar o código para excluir a conta
                    modal.style.display = "none";
                }
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>