console.log("scroll file load")


const page = document.querySelector('.page');
const pageContent = document.querySelector('.page-content');
const grid = document.querySelector('.home-video-grid');





function loadGrid() {
    for (let index = 0; index < 6; index++) {
        grid.appendChild(createVid());
    }
}




function createVid() {
    var thumbnail = document.createElement('img');
    thumbnail.className = "thumbnail";
    thumbnail.setAttribute("src", "data: image / png; base64,<?= $vids[$someVar]->thumbnail ?>");
    return thumbnail;
}

pageContent.addEventListener('scroll', evt => {

    console.log(document.clientHeight);
    console.log(evt.target.scrollTop);

    if ((evt.target.scrollTop / document.clientHeight) * 100 > 80) {
        /* setTimeout(loadGrid, 2000) */
        fetch("front-end/views/components/video.php")
            .then(response => {
                console.log(response)
            });
    }
});
