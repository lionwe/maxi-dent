import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

const initTeamSwiper = () => {
  const teamEl = document.querySelector('.team-swiper');
  if (!teamEl) return;

  new Swiper('.team-swiper', {
    modules: [Navigation, Pagination],
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 8,
    navigation: {
      nextEl: '.team-swiper-button-next',
      prevEl: '.team-swiper-button-prev',
    },
    pagination: {
      el: '.team-carousel__pagination',
      clickable: true,
      renderBullet: (i, cls) => `<span class="${cls}"></span>`,
    },
    watchOverflow: true,
    observer: true,
    observeParents: true,
    speed: 600,
    breakpoints: {
      768: { spaceBetween: 16 },
      992: { spaceBetween: 20 },
      1200: { spaceBetween: 24 },
      1400: { spaceBetween: 25 },
    },
  });
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initTeamSwiper);
} else {
  initTeamSwiper();
}

export default initTeamSwiper;
