import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let reviewsSwiper = null;

const cloneGrwIntoSwiper = () => {
  const swiperWrapper = document.querySelector('.reviews-swiper .swiper-wrapper');
  const grwReviews = document.querySelectorAll('.grw-widget-container .grw-review');
  if (!swiperWrapper || !grwReviews.length) return false;

  swiperWrapper.innerHTML = '';

  grwReviews.forEach((review) => {
    const slide = document.createElement('div');
    slide.className = 'swiper-slide';
    const card = document.createElement('div');
    card.className = 'reviews-card';
    const clone = review.cloneNode(true);
    card.appendChild(clone);
    slide.appendChild(card);
    swiperWrapper.appendChild(slide);
  });

  return true;
};

const initReviewsSwiper = () => {
  const root = document.querySelector('.reviews-swiper');
  if (!root) return;

  const ok = cloneGrwIntoSwiper();
  if (!ok) return;

  if (reviewsSwiper) {
    reviewsSwiper.destroy(true, true);
    reviewsSwiper = null;
  }

  reviewsSwiper = new Swiper('.reviews-swiper', {
    modules: [Navigation, Pagination],
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 20,
    navigation: {
      nextEl: '.reviews-swiper-button-next',
      prevEl: '.reviews-swiper-button-prev',
    },
    pagination: {
      el: '.reviews-carousel__pagination',
      clickable: true,
      renderBullet: (i, cls) => `<span class="${cls}"></span>`,
    },
    watchOverflow: true,
    observer: true,
    observeParents: true,
    speed: 600,
    breakpoints: {
      0: { slidesPerView: 1.1, spaceBetween: 10 },
      768: { slidesPerView: 'auto', spaceBetween: 16 },
      992: { slidesPerView: 'auto', spaceBetween: 20 },
      1200: { slidesPerView: 'auto', spaceBetween: 24 },
    },
  });

  reviewsSwiper.update();
};

const waitForGrw = (timeout = 10000) => {
  const start = Date.now();

  const check = () => {
    const ready = document.querySelectorAll('.grw-widget-container .grw-review').length > 0;
    if (ready) {
      initReviewsSwiper();
      return;
    }
    if (Date.now() - start > timeout) return;
    requestAnimationFrame(check);
  };

  check();
};

const init = () => {
  const sec = document.querySelector('.reviews-section');
  if (!sec) return;
  waitForGrw();
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}

export default initReviewsSwiper;
