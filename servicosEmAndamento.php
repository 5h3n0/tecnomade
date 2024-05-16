
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
            while($row = $result->fetch_assoc()) {
                
                $data = $row['data_Contratacao'];
                $data = date('d/m/Y', strtotime($data));
                
                echo "Serviço: " . $row["nomeService"]. "<br>";
                echo "Descrição: " . $row["descService"]. "<br>";
                echo "Categoria: " . $row["nomeCategoria"]. "<br>";
                echo "Valor: R$ $row[orcamento] <br>";
                // Se houver descrição de contratação, descomente a linha abaixo
                // echo "Descrição da Contratação: " . $row["mensagem_cliente"]. "<br>";
                echo "Data de Contratação: $data <br>";
            }
        } else {
            echo"<div class='semServicos'>";
            echo "<p>Nenhum serviço em andamento.</p>";
            echo"</div>";
            
        }
        ?>