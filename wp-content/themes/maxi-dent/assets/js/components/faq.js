const initFaq = () => {
  const faqSection = document.querySelector('.faq-section');
  if (!faqSection) return;

  faqSection.addEventListener('click', (e) => {
    const trigger = e.target.closest('.faq-accordion__trigger');
    if (!trigger) return;

    const item = trigger.closest('.faq-accordion__item');
    if (!item) return;

    const isOpen = item.classList.contains('faq-accordion__item--open');

    // Close other items
    faqSection
      .querySelectorAll('.faq-accordion__item--open')
      .forEach((openItem) => {
        if (openItem !== item) {
          openItem.classList.remove('faq-accordion__item--open');
          const openTrigger = openItem.querySelector(
            '.faq-accordion__trigger'
          );
          if (openTrigger) {
            openTrigger.setAttribute('aria-expanded', 'false');
          }
        }
      });

    // Toggle current item
    const newState = !isOpen;
    item.classList.toggle('faq-accordion__item--open', newState);
    trigger.setAttribute('aria-expanded', newState ? 'true' : 'false');
  });
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initFaq);
} else {
  initFaq();
}

export default initFaq;
