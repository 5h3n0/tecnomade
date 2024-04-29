<?php
session_start();
require_once 'connect.php';

if (isset($_SESSION['id_Pf'])) {
    $id_estagiario = $_SESSION['id_Pf'];

    $arquivo = $_FILES['arquivo']['name'];

    //Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = 'foto/';

    //Tamanho máximo do arquivo em Bytes
    $_UP['tamanho'] = 1024 * 1024 * 100; // 5mb

    //Array com a extensões permitidas
    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

    //Renomeiar
    $_UP['renomeia'] = false;

    //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
    if ($_FILES['arquivo']['error'] != 0) {
        die("Não foi possível fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    }

    //Faz a verificação do tamanho do arquivo
    else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        echo "
            <script type=\"text/javascript\">
                alert(\"Arquivo muito grande.\");
            </script>
        ";
    }

    //O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta foto
    else {
        //Primeiro verifica se deve trocar o nome do arquivo
        if ($_UP['renomeia'] == false) {
            //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = time() . '.jpg';
        } else {
            //Mantém o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        }

        //Verificar se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {

            //Upload efetuado com sucesso, exibe a mensagem
            // Consulta SQL para atualizar a coluna imagem da linha mais recente na tabela profissional
            $sql = "UPDATE prof SET imgData = ? WHERE imgData IS NULL";

            // Preparar a declaração
            $stmt = $conn->prepare($sql);

            // Vincular os parâmetros
            $stmt->bind_param("s", $nome_final);

            // Executar a declaração
            if ($stmt->execute()) {
                echo "<script>alert('Seu cadastro já foi feito, espere validação dos dados!'); window.location.href = 'estlog.php';</script>";
            } else {
                echo "Erro ao cadastrar imagem: " . mysqli_error($conn);
            }
        }
    }
}
?>
