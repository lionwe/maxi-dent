import { Popup } from "./class";
import { load } from "../events/main";

load(() => {
    const burgerMenu = new Popup(".backdrop.burger", {
        openButtons: ".js-burger-open",
        closeButton: ".js-burger-close",
        closeOnResize: true,
        on: {
            open() {
                document.body.classList.add("menu-open");
            },
            close() {
                document.body.classList.remove("menu-open");
            }
        }
    });

    // Close the menu when a menu item is clicked — the anchor works, scrolling is allowed

    const menuLinks = document.querySelectorAll(".burger-menu__nav a");
    menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            burgerMenu.close();
        });
    });
});
