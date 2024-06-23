<?php
// Start session if not already started
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['pfLogado'])) {
    header('Location: lgcd.php'); // Redirect to login page if not logged in
    exit();
}
include_once "navPf.php";

// Include database connection file
require_once "connect.php";

// Handle form submission for inserting new bank data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_insert'])) {
    $id_Pf = $_SESSION['id_Pf'];
    $banco = $_POST['nameBanco'];
    $conta = $_POST['Nconta'];
    $agencia = $_POST['Agencia'];

    // Validate inputs
    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        // Prepare SQL statement for insertion
        $sql_insert = "INSERT INTO dados_bancarios (id_Pf, banco, conta, agencia) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql_insert)) {
            $stmt->bind_param("isss", $id_Pf, $banco, $conta, $agencia);
            if ($stmt->execute()) {
                $_SESSION['message'] = "";
            } else {
                $_SESSION['message'] = "Erro ao inserir os dados: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Erro na preparação da query: " . $conn->error;
        }
    }
    header("Location: dados_bank.php"); // Redirect to bank data page
    exit();
}

// Handle form submission for updating existing bank data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update'])) {
    $id_Pf = $_POST['id_Pf'];
    $banco = $_POST['updateNameBanco'];
    $conta = $_POST['updateNconta'];
    $agencia = $_POST['updateAgencia'];

    // Validate inputs
    if (empty($banco) || empty($conta) || empty($agencia)) {
        $_SESSION['message'] = "Todos os campos são obrigatórios!";
    } else {
        // Prepare SQL statement for update
        $sql_update = "UPDATE dados_bancarios SET banco = ?, conta = ?, agencia = ? WHERE id_Pf = ?";
        if ($stmt = $conn->prepare($sql_update)) {
            $stmt->bind_param("sssi", $banco, $conta, $agencia, $id_Pf);
            if ($stmt->execute()) {
                $_SESSION['message'] = "";
            } else {
                $_SESSION['message'] = "Erro ao atualizar os dados: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Erro na preparação da query: " . $conn->error;
        }
    }
    header("Location: dados_bank.php"); // Redirect to bank data page
    exit();
}

// Retrieve and display existing bank data or display insert form if no data exists
$id_Pf = $_SESSION['id_Pf'];
$sql_select = "SELECT banco, conta, agencia FROM dados_bancarios WHERE id_Pf = ?";
if ($stmt = $conn->prepare($sql_select)) {
    $stmt->bind_param("i", $id_Pf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display existing data and option to update
        $row = $result->fetch_assoc();
        $banco = htmlspecialchars($row['banco']);
        $conta = htmlspecialchars($row['conta']);
        $agencia = htmlspecialchars($row['agencia']);

        echo "<div class='box_dadosBank'>";
        echo "<img src='./imgs/bbSelect.jpg' class='bank_img_alt' id='fotoDoBanco'>";

        echo "<h2 class='titulo_dadosBank'>Dados Bancários</h2>";
        echo "<p id='nome_do_banco'>Banco: <span>". $banco . "</span></p>";
        echo "<p>Conta: <span>". $conta. "</span></p>";
        echo "<p>Agência: <span>". $agencia . "</span></p>";
        echo "<button onclick='divUpdate()' class='btn_alt_save' >Atualizar dados</button>";
        echo "</div>";
    } else {
        // Display form to insert new data
        echo "<form action='dados_bank.php' method='post'>
    <input type='hidden' name='id_Pf' value='" . $id_Pf . "'>
    <div class='boxAddDadosBank'>
        <div class='box_imgs_bank'>
            <img src='./imgs/bancoBrasil.jpg' class='img_of_bank' id='bancoBrasil'>
            <img src='./imgs/caixaEconomica.jpg' class='img_of_bank' id='caixaEconomica'>
            <img src='./imgs/bancoBradesco.jpg' class='img_of_bank' id='bancoBradesco'>
            <img src='./imgs/bancoItau.png' class='img_of_bank' id='bancoItau'>
            <img src='./imgs/bancoSantander.jpg' class='img_of_bank' id='bancoSantander'>
            <img src='./imgs/bancoNUbank.jpg' class='img_of_bank' id='bancoNUbank'>
            <img src='./imgs/bancoC6bank.jpg' class='img_of_bank' id='bancoC6bank'>
            <img src='./imgs/bancoInter.jpg' class='img_of_bank' id='bancoInter'>
        </div>

        <label for='nameBanco'>Banco:</label>
        <select name='nameBanco' id='nameBanco' required>
            <option value='Banco do Brasil'>Banco do Brasil</option>
            <option value='Caixa Econômica'>Caixa Econômica</option>
            <option value='Bradesco'>Bradesco</option>
            <option value='Itaú'>Itaú</option>
            <option value='Santander'>Santander</option>
            <option value='Nu Bank'>Nu Bank</option>
            <option value='C6'>C6 S.A.</option>
            <option value='Inter'>Inter</option>
        </select>
        <br>
        <label for='Nconta'>Conta: </label>
        <input type='text' id='Nconta' name='Nconta' maxlength='10' required>
        <label for='Agencia'>Agência: </label>
        <input type='text' id='Agencia' name='Agencia' maxlength='10' required>
        <br>
        <input type='submit' name='submit_insert' value='Salvar' class='btn_alt_save'>
    </div>
</form>";
    }
    $stmt->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" sizes="512x512" href="./imgs/img_logo_black_and_white.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/style_dados_bank.css">


    <title>Seus dados</title>

<style>
    body {
  background-image: url("./imgs/1110251_Animation_Envelope_Glow_1280x720.gif");
  background-size: cover;
  display: flex;
    justify-content: center;
    align-items: center;  
}

</style>
    

</head>

<body>

    <?php
// Display success or error message if set
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
?>

<form action="dados_bank.php" class="divUpdate" method="post" style="display:none">
    <input type='hidden' name='id_Pf' value="<?php echo $id_Pf; ?>">
    <div class='boxAddDadosBank'>
        <div class="box_imgs_bank">
            <img src='./imgs/bancoBrasil.jpg' class='img_of_bank' id='bancoBrasil1'>
            <img src='./imgs/caixaEconomica.jpg' class='img_of_bank' id='caixaEconomica1'>
            <img src='./imgs/bancoBradesco.jpg' class='img_of_bank' id='bancoBradesco1'>
            <img src='./imgs/bancoItau.png' class='img_of_bank' id='bancoItau1'>
            <img src='./imgs/bancoSantander.jpg' class='img_of_bank' id='bancoSantander1'>
            <img src='./imgs/bancoNUbank.jpg' class='img_of_bank' id='bancoNUbank1'>
            <img src='./imgs/bancoC6bank.jpg' class='img_of_bank' id='bancoC6bank1'>
            <img src='./imgs/bancoInter.jpg' class='img_of_bank' id='bancoInter1'>
        </div>

        <label for='updateNameBanco'>Banco:</label>
        <select name='updateNameBanco' id='updateNameBanco' required>
            <option value='Banco do Brasil' <?php if ($banco == 'Banco do Brasil') echo 'selected'; ?>>Banco do Brasil</option>
            <option value='Caixa Econômica' <?php if ($banco == 'Caixa Econômica') echo 'selected'; ?>>Caixa Econômica</option>
            <option value='Bradesco' <?php if ($banco == 'Bradesco') echo 'selected'; ?>>Bradesco</option>
            <option value='Itaú' <?php if ($banco == 'Itaú') echo 'selected'; ?>>Itaú</option>
            <option value='Santander' <?php if ($banco == 'Santander') echo 'selected'; ?>>Santander</option>
            <option value='Nu Bank' <?php if ($banco == 'Nu Bank') echo 'selected'; ?>>Nu Bank</option>
            <option value='C6' <?php if ($banco == 'C6') echo 'selected'; ?>>C6 S.A.</option>
            <option value='Inter' <?php if ($banco == 'Inter') echo 'selected'; ?>>Banco Inter S.A.</option>
        </select>
        <br>
        <label for='updateNconta'>Conta: </label>
        <input type='text' id='updateNconta' name='updateNconta' maxlength='10' value="<?php echo $conta; ?>" required>
        <label for='updateAgencia'>Agência: </label>
        <input type='text' id='updateAgencia' name='updateAgencia' maxlength='10' value="<?php echo $agencia; ?>" required>
        <br>
        <input type='submit' name='submit_update' value='Alterar' class="btn_alt_save">
    </div>
</form>


<footer class="footer_sigle_slim">
        <p>Copyright&copy; 2023, Todos os direitos reservados <a href="#">Tecnomade_Enterprise</a></p>
        <!-- <a href="">Contact</a>
        <a href="">Privacy & Terms</a> -->
    </footer>



<!-- <?php
include_once "footer.php";
?> -->


<script>
    function divUpdate() {
        document.querySelector('.divUpdate').style.display = 'block';
        document.querySelector('.box_dadosBank').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
    const selectBanco = document.getElementById('nameBanco');
    const images = {
        'Banco do Brasil': document.getElementById('bancoBrasil'),
        'Caixa Econômica': document.getElementById('caixaEconomica'),
        'Bradesco': document.getElementById('bancoBradesco'),
        'Itaú': document.getElementById('bancoItau'),
        'Santander': document.getElementById('bancoSantander'),
        'Nu Bank': document.getElementById('bancoNUbank'),
        'C6': document.getElementById('bancoC6bank'),
        'Inter': document.getElementById('bancoInter')
    };

    selectBanco.addEventListener('change', function () {
        // Remove box-shadow from all images
        for (let img of document.querySelectorAll('.img_of_bank')) {
            img.style.boxShadow = 'none';
        }
        
        // Add box-shadow to the selected image
        const selectedBanco = selectBanco.value;
        if (images[selectedBanco]) {
            images[selectedBanco].style.boxShadow = '0 0 60px #00917e';
        }
    });
});

</script>

</body>

</html>