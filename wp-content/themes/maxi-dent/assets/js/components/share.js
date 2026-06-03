/**
 * Blog Share - Copy Link with Tooltip
 */

document.addEventListener('DOMContentLoaded', function() {
  const copyBtn = document.querySelector('.js-copy-link');
  const tooltip = document.getElementById('copy-tooltip');

  if (copyBtn && tooltip) {
    copyBtn.addEventListener('click', function() {
      const url = this.getAttribute('data-url');

      // Copy to clipboard
      navigator.clipboard.writeText(url).then(() => {
        // Show tooltip
        tooltip.classList.add('show');

        // Hide after 2 seconds
        setTimeout(() => {
          tooltip.classList.remove('show');
        }, 2000);
      }).catch(err => {
        console.error('Помилка копіювання:', err);
      });
    });
  }
});
