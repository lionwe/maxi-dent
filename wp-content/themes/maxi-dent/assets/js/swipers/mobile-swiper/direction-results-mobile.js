import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let serviceResultsSwiper = null;

const initServiceResultsSwiper = () => {
    const swiperEl = document.querySelector('.sr-swiper-mobile');
    if (!swiperEl) return;

    if (serviceResultsSwiper) {
        serviceResultsSwiper.destroy(true, true);
        serviceResultsSwiper = null;
    }

    serviceResultsSwiper = new Swiper('.sr-swiper-mobile', {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        navigation: {
            nextEl: '.sr-swiper-button-next',
            prevEl: '.sr-swiper-button-prev',
        },
        pagination: {
            el: '.sr-carousel__pagination',
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
    document.addEventListener('DOMContentLoaded', initServiceResultsSwiper);
} else {
    initServiceResultsSwiper();
}

export default initServiceResultsSwiper;
