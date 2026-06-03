import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

const initBlogSwiper = () => {
  const blogEl = document.querySelector('.blog-swiper');
  if (!blogEl) return;

  new Swiper('.blog-swiper', {
    modules: [Navigation, Pagination],
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 10,
    pagination: {
      el: '.blog-carousel__pagination',
      clickable: true,
      renderBullet: (index, className) => `<span class="${className}"></span>`,
    },
    navigation: {
      nextEl: '.blog-swiper-button-next',
      prevEl: '.blog-swiper-button-prev',
    },
    watchOverflow: true,
    observer: true,
    observeParents: true,
    speed: 600,
    breakpoints: {
      0: {
        slidesPerView: 1.2,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 'auto',
        spaceBetween: 16,
      },
      992: {
        slidesPerView: 'auto',
        spaceBetween: 18,
      },
      1200: {
        slidesPerView: 'auto',
        spaceBetween: 20,
      },
    },
  });
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initBlogSwiper);
} else {
  initBlogSwiper();
}

export default initBlogSwiper;
