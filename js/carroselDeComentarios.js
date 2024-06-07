document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector('.comentario_for_pf .carousel');
    const carouselInner = carousel.querySelector('.carousel-inner');
    const items = carouselInner.querySelectorAll('.carousel-item');
    let activeIndex = 0;

    function showItem(index) {
        items.forEach((item) => {
            item.classList.remove('active');
        });
        items[index].classList.add('active');
        updateIndicators();
    }

    function nextSlide() {
        activeIndex = (activeIndex + 1) % items.length;
        showItem(activeIndex);
    }

    function prevSlide() {
        activeIndex = (activeIndex - 1 + items.length) % items.length;
        showItem(activeIndex);
    }

    carousel.querySelector('.prev').addEventListener('click', prevSlide);
    carousel.querySelector('.next').addEventListener('click', nextSlide);

    setInterval(nextSlide, 5000);

    const indicators = document.querySelectorAll('.carousel-indicators .indicator');

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showItem(index);
            activeIndex = index;
        });
    });

    function updateIndicators() {
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === activeIndex);
        });
    }

    // Mostrar o primeiro item inicialmente
    showItem(activeIndex);
});
