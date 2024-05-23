<?php
include 'connect.php';

$result = $conn->query("SELECT * FROM portfolio");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

.portfolio {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.project {
    background-color: #fff;
    border: 1px solid #ddd;
    margin: 10px;
    padding: 20px;
    width: 300px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.carousel {
    display: flex;
    overflow-x: scroll;
    margin-top: 10px;
}

.carousel img {
    max-width: 100%;
    height: auto;
    margin-right: 10px;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <h1>Meu Portfólio</h1>
<a href="insert_portifolio.php">Inserir Serviço</a>
    <div class="portfolio">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="project">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p><?php echo htmlspecialchars($row['date']); ?></p>

                <div class="carousel">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <?php $imagePath = 'upload/' . $row["image$i"]; ?>
                        <?php if (!empty($row["image$i"]) && file_exists($imagePath)): ?>
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Image <?php echo $i; ?>">
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
