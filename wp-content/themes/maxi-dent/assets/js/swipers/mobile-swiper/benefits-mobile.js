import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let benefitsSwiper = null;

const initBenefitsSwiper = () => {
    const swiperEl = document.querySelector('.benefits-swiper-mobile');
    if (!swiperEl) return;

    if (benefitsSwiper) {
        benefitsSwiper.destroy(true, true);
        benefitsSwiper = null;
    }

    benefitsSwiper = new Swiper('.benefits-swiper-mobile', {
        modules: [Navigation, Pagination],
        slidesPerView: 'auto', 
        spaceBetween: 5,
        loop: false,
        navigation: {
            nextEl: '.benefits-swiper-button-next',
            prevEl: '.benefits-swiper-button-prev',
        },
        pagination: {
            el: '.benefits-carousel__pagination',
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
    document.addEventListener('DOMContentLoaded', initBenefitsSwiper);
} else {
    initBenefitsSwiper();
}

export default initBenefitsSwiper;
