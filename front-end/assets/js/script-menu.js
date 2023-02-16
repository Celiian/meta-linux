const menu = document.getElementsByClassName("hamburger-menu-container");
const menuShort = document.getElementsByClassName("short-menu");
const burgerButton = document.getElementsByClassName("hamburger-button-home");
const nameUrl = location.search.split("name=")[1];
const navElements = document.getElementsByClassName("nav-item-text");
const navElementsCase = document.getElementsByClassName("nav-item");

switch (nameUrl) {
  case "Home":
    navElementsCase[0].classList.add("nav-item-active");
    break;
  case "Explorer":
    navElementsCase[1].classList.add("nav-item-active");
    break;
  case "Subscriptions":
    navElementsCase[2].classList.add("nav-item-active");
    break;
  case "Library":
    navElementsCase[3].classList.add("nav-item-active");
    break;
  case "History":
    navElementsCase[4].classList.add("nav-item-active");
    break;
  case "WatchLater":
    navElementsCase[5].classList.add("nav-item-active");
    break;
  case "LikedVideo":
    navElementsCase[6].classList.add("nav-item-active");
    break;
  default:
    break;
}

function closeMenu() {
  burgerButton[0].setAttribute("onclick", "openMenu()");
  menu[0].style.transform = "translateX(var(--menu-width-close))";
  menu[0].style.transition = "transform 500ms ease-out";
  menuShort[0].style.display = "flex";
  menu[0].style.display = "none";
  document.documentElement.style.setProperty("--video-content-width", "20%");
}

function openMenu() {
  burgerButton[0].setAttribute("onclick", "closeMenu()");
  menu[0].style.transform = "translateX(var(--menu-width))";
  menu[0].style.transition = "transform 500ms ease-out";
  menuShort[0].style.display = "none";
  menu[0].style.display = "flex";
  document.documentElement.style.setProperty("--video-content-width", "10%");
}
