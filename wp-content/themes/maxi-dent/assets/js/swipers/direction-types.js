import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let servicesTypesInstance = null;

const initServicesTypesSwiper = () => {
  const swiperEl = document.querySelector('.services-types-swiper');
  if (!swiperEl) return;

  if (servicesTypesInstance) {
    servicesTypesInstance.destroy(true, true);
    servicesTypesInstance = null;
  }

  servicesTypesInstance = new Swiper(swiperEl, {
    modules: [Navigation, Pagination],
    slidesPerView: 2.2, 
    spaceBetween: 20,
    speed: 600,
    loop: false,
    centeredSlides: false,
    pagination: {
      el: '.services-types-carousel__pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.services-types-swiper-button-next',
      prevEl: '.services-types-swiper-button-prev',
    },
    watchOverflow: true,
    observer: true,
    observeParents: true,
    breakpoints: {
      1200: { slidesPerView: 2.2 },
      900: { slidesPerView: 1.1 }
    }
  });

  servicesTypesInstance.update();
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initServicesTypesSwiper);
} else {
  initServicesTypesSwiper();
}

export default initServicesTypesSwiper;
