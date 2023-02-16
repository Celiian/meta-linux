const switchTheme = document.getElementsByClassName('switch__input')[0];
const root = document.documentElement;
const littleMenu = document.getElementsByClassName('short-menu')[0];
const bigMenu = document.getElementsByClassName('hamburger-menu-container')[0];
console.log("file theme load")

function changeTheme() {
    if (switchTheme.getAttribute("value") == 0) {
        switchTheme.setAttribute("value", "1");
        root.style.setProperty('--color-theme', "rgb(243, 243, 243)");
        root.style.setProperty('--color-text', "rgb(20, 20, 20)");
        root.style.setProperty('--background-color-nav', "rgb(243, 243, 243)");
        root.style.setProperty('--color-search', "rgb(243, 243, 243)");
        root.style.setProperty('--color-filter', "rgb(243, 243, 243)");
        root.style.setProperty('--elements-hover', "rgba(187, 185, 185, 0.739)");
        root.style.setProperty('--svg-color', "invert(100%) sepia(0%) saturate(2%) hue-rotate(169deg) brightness(103%) contrast(101%)");
        bigMenu.style.borderRight = "1px var(--menu-border-color) solid";
        littleMenu.style.borderRight = "0.5px var(--menu-border-color) solid";
        root.style.setProperty("--search-btn-color", "#b8b5b5");

    }
    else {
        switchTheme.setAttribute("value", "0");

        root.style.setProperty('--color-theme', "rgb(12, 12, 12)");
        root.style.setProperty('--color-text', "rgb(255, 255, 255)");
        root.style.setProperty('--background-color-nav', "#202020f3");
        root.style.setProperty('--color-search', "#121212");
        root.style.setProperty('--color-filter', "rgb(65, 64, 64)");
        root.style.setProperty('--elements-hover', "rgb(42, 42, 42)");
        root.style.setProperty('--svg-color', "invert(0%) sepia(0%) saturate(7500%) hue-rotate(312deg) brightness(100%) contrast(107%)");
        bigMenu.style.borderRight = "none";
        littleMenu.style.borderRight = "none";
        root.style.setProperty("--search-btn-color", "#313131");


    }
}