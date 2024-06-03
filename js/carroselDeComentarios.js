let currentIndex = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlides() {
    const inner = document.getElementById('carousel-inner');
    if (inner) {
        inner.style.transition = "transform 0.5s ease-in-out";
        inner.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlides();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    showSlides();
}

// Automaticamente avança para o próximo slide a cada 3 segundos
setInterval(nextSlide, 3000);

const mensagens = ['Mensagem 1', 'Mensagem 2', 'Mensagem 3']; // Substitua com suas mensagens
const inner = document.getElementById('carousel-inner');
if (inner && mensagens) {
    mensagens.forEach(mensagem => {
        const slide = document.createElement('div');
        slide.classList.add('carousel-item');
        slide.textContent = mensagem;
        inner.appendChild(slide);
    });
}
