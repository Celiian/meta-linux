const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
let carouselWidth = document.querySelector('.creator-rise-grid').offsetWidth;
let track = document.querySelector('.creator-rise-video')
let bodyWidth = document.body.offsetWidth;
let index = 0;

next.addEventListener('click', () => {
    index++;
    track.style.transform = `translateX(-${index * carouselWidth}px)`;
    track.style.transition = `transform 500ms ease-in-out`;
    track.style.overflow = "visible";
    if (index === 1) {
        next.classList.remove('show-arrow');
        next.classList.add('hide-arrow')
    }
    prev.classList.add('show-arrow');
    prev.classList.remove('hide-arrow');
})

prev.addEventListener('click', () => {
    index--;
    next.classList.remove('hide-arrow');
    if (index === 0) {
        prev.classList.remove('show-arrow');
        prev.classList.add('hide-arrow');

    }
    track.style.transform = `translateX(-${index * carouselWidth}px)`;
    track.style.transition = `transform 500ms ease-in-out`;
    track.style.overflow = "hidden";

})