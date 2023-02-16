<?php ob_start();
$page = "MetaTubePremium"; ?>

<div class="MetaTubePremium-container">

    <img src="../../../front-end/assets/img/MetaTubePremium/logov3.svg" alt="MetaTube Premium" srcset="" class="svg" />
    <p class="premium-p"><?= $enJson['MetaTubePremium']['title'] ?></p>

    <div class="button-container">
        <button class="btn-free"><?= $enJson['MetaTubePremium']['txt-button'] ?></button>
    </div>
    <h2><?= $enJson['MetaTubePremium']['price'] ?></h2>
    <p><?= $enJson['MetaTubePremium']['remind-text'] ?></p>
    <p><?= $enJson['MetaTubePremium']['add-price'] ?><a href=""
            class="link-premium"><?= $enJson['MetaTubePremium']['link-add-price'] ?></a></p>
    <a class="link-premium" href=""><?= $enJson['MetaTubePremium']['link-premium'] ?></a>
</div>

<div class="container2">
    <div class="ad-free">
        <img class="no-add-play-logo svg" src="../../../front-end/assets/img/MetaTubePremium/no-add-play.svg"
            alt="pub-img">
        <p class="text-ad"><?= $enJson['MetaTubePremium']['text-ad'] ?></p>
        <p class="text-ad2"><?= $enJson['MetaTubePremium']['text-ad2'] ?></p>
    </div>
    <div class="ad-free">
        <img class="no-add-play-logo svg" src="../../../front-end/assets/img/MetaTubePremium/download-logo.svg"
            alt="pub-img">
        <p class="text-ad"><?= $enJson['MetaTubePremium']['text-dl'] ?></p>
        <p class="text-ad2"><?= $enJson['MetaTubePremium']['text-dl2'] ?></p>
    </div>
    <div class="ad-free">
        <img class="no-add-play-logo svg" src="../../../front-end/assets/img/MetaTubePremium/music-logo.svg"
            alt="pub-img">
        <p class="text-ad"><?= $enJson['MetaTubePremium']['text-music'] ?></p>
        <p class="text-ad2"><?= $enJson['MetaTubePremium']['text-music2'] ?></p>
    </div>
</div>

<?php $pageName = ob_get_clean() ?>