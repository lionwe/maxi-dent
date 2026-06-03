import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let resultsSwiper = null;

const initResultsSwiper = () => {
    const swiperEl = document.querySelector('.results-swiper-mobile');
    if (!swiperEl) return;

    if (resultsSwiper) {
        resultsSwiper.destroy(true, true);
        resultsSwiper = null;
    }

    resultsSwiper = new Swiper('.results-swiper-mobile', {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        navigation: {
            nextEl: '.results-swiper-button-next',
            prevEl: '.results-swiper-button-prev',
        },
        pagination: {
            el: '.results-carousel__pagination',
            clickable: true,
            renderBullet: (index, className) => `<span class="${className}"></span>`,
        },
        speed: 600,
        watchOverflow: true,
        observer: true,
        observeParents: true,
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initResultsSwiper);
} else {
    initResultsSwiper();
}

export default initResultsSwiper;
