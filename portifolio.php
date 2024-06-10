<?php
include 'connect.php';
if (!isset($_SESSION)) {
    session_start();
  }
  $id_Pf = $_SESSION['id_Pf'];
include_once('navPf.php');
$result = $conn->query("SELECT * FROM portfolio WHERE id_Pf = '$id_Pf'");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <link rel="stylesheet" href="./css/portifolio.css">
    
</head>
<body>
    <h1 id="titlePage">Meu Portfólio</h1>
   <p class="insert_service"> <a href="insert_portifolio.php" class="insert_service">Inserir Serviço</a></p>
    <div class="portfolio">
        <?php while($row = $result->fetch_assoc()): ?>
            
            <div class="project">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p><?php echo htmlspecialchars($row['date']); ?></p>
                <div class="carousel">
                    <div class="carousel_inner">
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <?php $imagePath = 'upload_portifolio/' . $row["image$i"]; ?>
                            <?php if (!empty($row["image$i"]) && file_exists($imagePath)): ?>
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Image <?php echo $i; ?>">
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div class="carousel_control">
                        <button class="bnt_left"><</button>
                        <button class="bnt_right">></button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <script>
        class Carousel {
            constructor(carouselElement) {
                this.carousel = carouselElement;
                this.carouselInner = this.carousel.querySelector('.carousel_inner');
                this.items = this.carouselInner.querySelectorAll('img');
                this.activeIndex = 0;

                this.init();
            }

            init() {
                this.showItem(this.activeIndex);
                this.carousel.querySelector('.bnt_left').addEventListener('click', () => this.prevSlide());
                this.carousel.querySelector('.bnt_right').addEventListener('click', () => this.nextSlide());

                setInterval(() => {
                    this.nextSlide();
                }, 3000);
            }

            showItem(index) {
                this.items.forEach((item, i) => {
                    item.classList.toggle('active', i === index);
                });
            }

            nextSlide() {
                this.activeIndex = (this.activeIndex + 1) % this.items.length;
                this.showItem(this.activeIndex);
            }

            prevSlide() {
                this.activeIndex = (this.activeIndex - 1 + this.items.length) % this.items.length;
                this.showItem(this.activeIndex);
            }
        }

        // Initialize the carousel for each instance
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.carousel').forEach(carouselElement => {
                new Carousel(carouselElement);
            });

            // Show the carousel on hover
            document.querySelectorAll('.project').forEach(projectElement => {
                projectElement.addEventListener('mouseenter', () => {
                    const carousel = projectElement.querySelector('.carousel');
                    if (carousel) {
                        carousel.style.display = 'flex';
                    }
                });

                projectElement.addEventListener('mouseleave', () => {
                    const carousel = projectElement.querySelector('.carousel');
                    if (carousel) {
                        carousel.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
