<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/style_infPePf.css">
    <title>Dados</title>
</head>

<body>
    <?php
    include_once('navPf.php');
    ?>
    <br>
    <br>
    <br>
    <br>
    
    <div class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="#">Dados da sua conta</a></li>
                <li><a href="#">Alterar Senha</a></li>
                <li><a href="#">Excluir conta</a></li>
            </ul>
        </aside>
        <main>
        
            
            <section class="card" id="dados-conta">
                <img src="./imgs/internet-banking-e-conexoes-de-rede-pagamentos-online-compras-e-negocios-de-tecnologia-digital_77174.jpg" alt="">
                <h2>Seus Dados para Receber o pagamento</h2>
                <p>Manter seus dados bancários atualizados e corretos é crucial para garantir que você receba seus pagamentos de forma rápida e segura. Nesta seção, você pode visualizar e editar as informações necessárias para o processamento de seus recebimentos, como o nome do banco, número da conta, e agência. É essencial que todos os detalhes fornecidos sejam precisos para evitar atrasos ou erros nas transferências. Certifique-se de revisar periodicamente essas informações, especialmente se você mudar de banco ou atualizar seus dados bancários. Além disso, ao fornecer suas informações bancárias, você pode ter a certeza de que seguimos rigorosas políticas de segurança e privacidade para proteger seus dados contra acessos não autorizados. Recomendamos também que você mantenha registros de todas as alterações feitas, para fins de auditoria e controle pessoal. Garantir que seus dados bancários estejam sempre corretos não só facilita os pagamentos, mas também fortalece a confiança e a transparência entre você e nossa plataforma. <a href="">Ver os dados da sua conta</a></p>
            </section>
            <section class="card" id="alterar-senha">
                <img src="" alt="">
                <h2>Alterar Senha</h2>
                <p>Alterar sua senha regularmente é uma das melhores práticas para manter sua conta segura. A senha é a primeira linha de defesa contra acessos não autorizados e, por isso, deve ser forte e única. Nesta seção, você pode facilmente atualizar sua senha, garantindo que somente você tenha acesso à sua conta. Recomendamos que sua nova senha tenha pelo menos oito caracteres, incluindo uma combinação de letras maiúsculas e minúsculas, números e símbolos. Evite usar senhas óbvias ou fáceis de adivinhar, como datas de aniversário ou sequências numéricas simples. Além disso, é uma boa prática não reutilizar senhas de outros sites ou serviços. Após alterar sua senha, certifique-se de armazená-la em um local seguro e considere o uso de um gerenciador de senhas para mantê-la protegida. Lembre-se de que a segurança da sua conta é uma responsabilidade compartilhada, e manter suas credenciais seguras ajuda a proteger não apenas suas informações, mas também a integridade de toda a nossa plataforma. <a href="">Redefinir Senha.</a></p>

            </section>
            <section class="card" id="excluir-conta">
                <h2>Excluir conta</h2>
                <p>Cuidado! Esta ação é irreversível.</p>
                <a href="#" id="deleteAccountBtn">Excluir conta</a>
                <div id="confirmModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Tem certeza que deseja excluir sua conta?</h2>
                        <p>Esta ação não pode ser desfeita.</p>
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