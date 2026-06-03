import { Popup } from './popups/class.js';
import ScrollTop from './components/ScrollTop.js'; 

document.addEventListener('DOMContentLoaded', () => {

    // Scroll Top Init
    new ScrollTop('.js-scroll-top');

    const thankYouPopup = new Popup('#popup-thank-you', {
        closeButton: '.close-popup-btn',
        on: {
            open: () => document.body.style.overflow = 'hidden',
            close: () => document.body.style.overflow = ''
        }
    });

    document.addEventListener("reintegrationFormSubmitted", ({ detail }) => {
        const { form, data } = detail;

        if (data.success) {
            form.reset();
            thankYouPopup.open();
        } else {
            alert(data.message || "Помилка при відправці");
        }

        const btn = form.querySelector('button[type="submit"]');
        if (btn) {
            btn.disabled = false;
            if (btn.hasAttribute('data-original-text')) {
                btn.innerHTML = btn.getAttribute('data-original-text');
            }
        }
    });

});

export function getProp(element, property, defaultValue = "") {
    return (
        window.getComputedStyle(element).getPropertyValue(property) ||
        defaultValue
    );
}

export function setProp(element, property, value) {
    element.style.setProperty(property, value);
}