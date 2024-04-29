<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .container {
            margin-top: 50px;
        }
        .card-text, .card-title{
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        require_once 'connect.php';
        include_once 'navUsr.php';
        if(isset($_POST['id_servico'])) {
            $servico_id = $_POST['id_servico'];
            $sql = "SELECT * FROM services WHERE id_Service = $servico_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h1>Detalhes do Serviço</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nomeService']; ?></h5>
                        <p class="card-text"><?php echo $row['descService']; ?></p>
                        <p class="card-text">Preço: R$ <?php echo $row['vlrService']; ?></p>
                        <p class="card-text">Profissional: <?php echo $row['id_Pf']; ?></p>
                  
                        <form action="contratServiceBd.php" method="POST">
                        <input type="hidden" name="id_Service" value="<?php echo $row['id_Service']; ?>">
                            <input type="hidden" name="descService" value="<?php echo $row['descService']; ?>">
                            <input type="hidden" name="vlrService" value="<?php echo $row['vlrService']; ?>">
                            <input type="hidden" name="id_Pf" value="<?php echo $row['id_Pf']; ?>">
                            <button type="submit" class="btn btn-primary">Contratar Serviço</button>
                        </form>
                        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Voltar</a>
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
