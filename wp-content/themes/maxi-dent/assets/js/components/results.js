const initResults = () => {
  // Flip card logic
  const cards = document.querySelectorAll('.results-card, .sr-card');
  
  cards.forEach(card => {
    card.addEventListener('click', function() {
      this.classList.toggle('flipped');
    });
  });

  // Load More logic
  const loadMoreBtn = document.querySelector('.js-sr-load-more');
  
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function(e) {
      e.preventDefault();
      
      const container = loadMoreBtn.closest('.sr-section');
      const hiddenCards = container.querySelectorAll('.sr-card.sr-card--extra');
      const isExpanded = loadMoreBtn.classList.contains('expanded');
      const textSpan = loadMoreBtn.querySelector('.btn-secondary__text') || loadMoreBtn;

      if (!isExpanded) {
        // Expand
        hiddenCards.forEach(card => {
          card.classList.remove('sr-card--hidden');
        });
        
        if (loadMoreBtn.dataset.textHide) {
            textSpan.textContent = loadMoreBtn.dataset.textHide;
        }
        loadMoreBtn.classList.add('expanded');
      } else {
        // Collapse
        hiddenCards.forEach(card => {
          card.classList.add('sr-card--hidden');
        });

        if (loadMoreBtn.dataset.textShow) {
            textSpan.textContent = loadMoreBtn.dataset.textShow;
        }
        loadMoreBtn.classList.remove('expanded');
      }
    });
  }
  
  console.log('Results component initialized');
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initResults);
} else {
  initResults();
}

export default initResults;