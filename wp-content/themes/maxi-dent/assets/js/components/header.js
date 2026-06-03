/**
 * Header initialization
 * Scroll logic removed as requested (static header)
 */

export function initHeader() {
  // Burger menu is initialized in popups/main.js
}

// Auto-initialize on DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeader);
} else {
  initHeader();
}

export default initHeader;