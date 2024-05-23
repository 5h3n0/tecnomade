<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $id_Pf = $_POST['id_Pf'];
    // Verifica se a pasta "uploads" existe, se não, tenta criá-la
    $uploadDir = 'upload_portifolio/';

    // Preparando a consulta SQL com placeholders para os valores
    $sql = "INSERT INTO portfolio (title, id_Pf, description, date";
    $params = "ssss";
    $placeholders = "?, ?, ?, ?";

    // Inicializando os valores dos parâmetros e os placeholders
    $values = [$title, $id_Pf, $description, $date];

    // Inicializando os placeholders adicionais para as imagens
    for ($i = 1; $i <= 10; $i++) {
        if (!empty($_FILES['image'.$i]['name'])) {
            $imageName = $_FILES['image'.$i]['name'];
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $hashedName = md5($imageName . time()) . '.' . $extension;
            $images[] = $hashedName; // Armazena o nome criptografado da imagem

            // Move o arquivo para a pasta "uploads" com o novo nome criptografado
            $uploadPath = $uploadDir . $hashedName;
            move_uploaded_file($_FILES['image'.$i]['tmp_name'], $uploadPath);

            $sql .= ", image".$i;
            $params .= "s"; // Adicionando 's' para cada imagem
            $placeholders .= ", ?"; // Adicionando um novo marcador de posição para cada imagem
        }
    }

    $sql .= ") VALUES (".$placeholders.")";

    // Preparando a instrução SQL
    $stmt = $conn->prepare($sql);

    // Criando um array de referências para os valores dos parâmetros
    $refs = array(&$params);
    foreach ($values as $key => $value) {
        $refs[] = &$values[$key];
    }
    foreach ($images as $key => $image) {
        $refs[] = &$images[$key];
    }

    // Executando a ligação dos parâmetros
    call_user_func_array(array($stmt, 'bind_param'), $refs);

    // Executando a instrução SQL
    if ($stmt->execute()) {
        header("Location: portifolio.php");
    } else {
        echo "Erro ao adicionar projeto: " . $stmt->error;
    }
}
?>
