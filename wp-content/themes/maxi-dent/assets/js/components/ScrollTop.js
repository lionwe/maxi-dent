export default class ScrollTop {
  constructor(selector) {
    this.btn = document.querySelector(selector);
    this.threshold = 400;

    if (!this.btn) return;

    this.init();
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    // Scroll listener for visibility
    window.addEventListener('scroll', () => {
      this.toggleVisibility();
    });

    // Click listener for action
    this.btn.addEventListener('click', (e) => {
      e.preventDefault();
      this.scrollToTop();
    });
  }

  toggleVisibility() {
    if (window.scrollY > this.threshold) {
      this.btn.classList.add('scroll-top--active');
    } else {
      this.btn.classList.remove('scroll-top--active');
    }
  }

  scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
}