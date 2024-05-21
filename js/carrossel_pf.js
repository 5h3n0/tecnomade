const carousel = document.querySelector('.carrossel_works_pf');
const carouselInner = carousel.querySelector('.carousel_inner_pf');
const items = carouselInner.querySelectorAll('.item_slide_of_car');
let activeIndex = 0;

function showItem(index) {
    items.forEach((item) => {
        item.classList.remove('slide_active_pf');
    });
    items[index].classList.add('slide_active_pf');
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

carousel.querySelector('.bnt_left').addEventListener('click', prevSlide);
carousel.querySelector('.bnt_right').addEventListener('click', nextSlide);

setInterval(() => {
    nextSlide();
}, 5000);

const indicators = document.querySelectorAll('.indicatodor_car');

indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        showItem(index);
        activeIndex = index;
        updateIndicators();
    });
});

function updateIndicators() {
    indicators.forEach((indicator, index) => {
        if (index === activeIndex) {
            indicator.classList.add('indicatodor_active');
        } else {
            indicator.classList.remove('indicatodor_active');
        }
    });
}