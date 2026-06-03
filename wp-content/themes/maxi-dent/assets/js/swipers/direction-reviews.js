import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

let reviewsInstance = null;

// Populate slides and init
const populateAndInitSwiper = () => {
  const wrapper = document.querySelector('.single-service-reviews-swiper .swiper-wrapper');
  const grwReviews = document.querySelectorAll('.grw-widget-container .grw-review');
  if (!wrapper || grwReviews.length === 0) return false;

  // Clear and build slides
  wrapper.innerHTML = '';
  grwReviews.forEach((review) => {
    const slide = document.createElement('div');
    slide.className = 'swiper-slide single-service-reviews-card';
    const clone = review.cloneNode(true);
    slide.appendChild(clone);
    wrapper.appendChild(slide);
  });

  // Collect all nav buttons (desktop + mobile)
  const nextEls = Array.from(
    document.querySelectorAll(
      '.single-service-reviews-button-next, .single-service-reviews-button-next-mobile',
    ),
  );
  const prevEls = Array.from(
    document.querySelectorAll(
      '.single-service-reviews-button-prev, .single-service-reviews-button-prev-mobile',
    ),
  );

  // Destroy previous instance
  if (reviewsInstance) {
    reviewsInstance.destroy(true, true);
    reviewsInstance = null;
  }

  // Init Swiper
  reviewsInstance = new Swiper('.single-service-reviews-swiper', {
    modules: [Navigation, Pagination],
    loop: false,
    slidesPerView: 4,
    spaceBetween: 19,
    pagination: {
      el: '.single-service-reviews-pagination',
      clickable: true,
      renderBullet: (index, className) => `<span class="${className}"></span>`,
    },
    navigation: {
      nextEl: nextEls,
      prevEl: prevEls,
    },
    watchOverflow: true,
    observer: true,
    observeParents: true,
    speed: 600,
    breakpoints: {
      0: {
        slidesPerView: 1.1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2.1,
        spaceBetween: 16,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 19,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 19,
      },
    },
  });

  // Ensure correct layout
  reviewsInstance.update();
};

// Wait for GRW to render
const waitForGRW = (callback, timeout = 10000) => {
  const start = Date.now();
  const check = () => {
    const ready =
      document.querySelectorAll('.grw-widget-container .grw-review').length > 0;
    if (ready) {
      callback();
      return;
    }
    if (Date.now() - start > timeout) return;
    requestAnimationFrame(check);
  };
  check();
};

// Entry point
const initReviewsSwiper = () => {
  const el = document.querySelector('.single-service-reviews-swiper');
  if (!el) return;
  waitForGRW(populateAndInitSwiper);
};

// DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initReviewsSwiper);
} else {
  initReviewsSwiper();
}

export default initReviewsSwiper;
