import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let sbSwiper = null;

const initServiceBenefitsSwiper = () => {
  const el = document.querySelector('.sb-swiper-mobile');
  if (!el) return;

  if (sbSwiper) {
    sbSwiper.destroy(true, true);
    sbSwiper = null;
  }

  sbSwiper = new Swiper('.sb-swiper-mobile', {
    modules: [Navigation, Pagination],
    slidesPerView: 'auto',
    spaceBetween: 5,
    loop: false,
    navigation: {
      nextEl: '.sb-swiper-button-next',
      prevEl: '.sb-swiper-button-prev',
    },
    pagination: {
      el: '.sb-carousel__pagination',
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
  document.addEventListener('DOMContentLoaded', initServiceBenefitsSwiper);
} else {
  initServiceBenefitsSwiper();
}

export default initServiceBenefitsSwiper;
