
        <?php
        include_once("connect.php");
        session_start();
        $id_Usr = $_SESSION['id_Usr'];
        $sql = "SELECT s.nomeService, s.descService, c.valor AS orcamento, c.data_Contratacao, cat.nome AS nomeCategoria
        FROM contratacoes c 
        INNER JOIN services s ON c.id_Service = s.id_Service 
        INNER JOIN categorias cat ON s.id_Cat = cat.id_Cat
        LEFT JOIN orcamento o ON c.id_Contratacao = o.id_solicitacao
        WHERE c.id_Usr = $id_Usr AND c.id_Contratacao NOT IN (SELECT id_contratacao FROM servicos_realizados)";        

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo"<div class='servicosEmAndamento'>";
            while($row = $result->fetch_assoc()) {
                echo"<div class='emAndamento'>";
                $valor = $row['orcamento'];
        $valor = substr($valor, 0, -2);
        $valor = number_format($valor, 2, ',', '.');
                $data = $row['data_Contratacao'];
                $data = date('d/m/Y', strtotime($data));
                echo "<label class='lbl_emAndamento'>Serviço</label>";
                echo "<p class='dados_andamento'>" . $row["nomeService"]. "</p>";
                echo "<label class='lbl_emAndamento'>Descrição</label>";
                echo "<p class='dados_andamento' id='desc_andamento'>" . $row["descService"]. "</p>";
                echo "<label class='lbl_emAndamento'>Categoria</label>";
                echo "<p class='dados_andamento'>" . $row["nomeCategoria"]. "</p>";
                echo "<label class='lbl_emAndamento'>Valor</label>";
                echo "<p class='dados_andamento'>R$ $valor</p>";
                // echo "<label class='lbl_emAndamento'>Descrição da Contratação</label>";
                // echo "<p class='dados_andamento'>" . $row["mensagem_cliente"]. "</p>";
                echo "<label class='lbl_emAndamento'>Contratação</label>";
                echo "<p class='dados_andamento'>$data</p>";
                echo"</div>";
            }
            echo"</div>";
        } else {
            echo"<div class='semServicos'>";
            echo "<p>Nenhum serviço em andamento.</p>";
            echo"</div>";
            
        }
        ?>