<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Serviço</title>
    <link rel="stylesheet" href="./css/contratService.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="./css/default.css">
    <style>
        
        
    </style>
</head>

<body>
    <div class="container_dth_services">
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        require_once 'connect.php';
        include_once 'navUsr.php';
        if (isset($_POST['id_servico'])) {
            $servico_id = $_POST['id_servico'];
            $sql = "SELECT services.*, prof.pfName 
        FROM services 
        INNER JOIN prof ON services.id_Pf = prof.id_Pf 
        WHERE services.id_Service = $servico_id";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h1>Detalhes do Serviço</h1>
                <div class="card">
                    <div class="card-body">
                        
                        <h5 class="card-title"><?php echo $row['nomeService']; ?></h5>
                        <p class="card-text"><?php echo $row['descService']; ?></p>
                        <p class="card-text">Profissional: <?php echo $row['pfName']; ?></p>
                        <p class="card-text">Data de Contratação: <?php echo date("d-m-Y"); ?></p>
                        

                        <form action="solicitar_servico.php" method="POST">
                            <input type="hidden" name="id_Service" value="<?php echo $row['id_Service']; ?>">
                            <input type="hidden" name="id_Pf" value="<?php echo $row['id_Pf']; ?>">
                            <input type="hidden" name="descService" value="<?php echo $row['descService']; ?>">
                            <div class="mb-3">
                                <label for="mensagem_cliente">*Escreva qual necessecidade precisa ser atendida e o Profissional em breve dará um orçamento:*</label>
                                <textarea class="form-control" id="mensagem_cliente" name="pedidoUsr" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Pedir Orçamento</button>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                echo "<p class='text-danger'>Serviço não encontrado.</p>";
            }
        } else {
            echo "<p class='text-danger'>Nenhum serviço selecionado.</p>";
        }
        ?>
    </div>
</body>

</html>
