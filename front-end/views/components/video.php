<?php ob_start(); ?>

<a href="index.php?name=Watch&id=<?= $vids[$someVar]->id ?>" class="video-link-home">
    <div class="home-video-content">
        <img src="data:image/png;base64,<?= $vids[$someVar]->thumbnail ?>" alt="thumbnail" class="thumbnail" />
        <div class="below-content">
            <div class="below-content-img">
                <img src="data:image/png;base64,<?= $vids[$someVar]->channelProfilePicture ?>" alt=""
                    class="video-channel-img" />
            </div>
            <div class="below-content-text">
                <strong class="video-title"><?= $vids[$someVar]->title ?></strong>
                <p class="video-channel-name"><?= $vids[$someVar]->channelName; ?></p>
                <div class="video-infos">
                    <p class="video-number-views"><?= $vids[$someVar]->viewNumber ?></p>
                    <p class="video-date"><?= $vids[$someVar]->date ?></p>
                </div>
            </div>
        </div>
    </div>
</a>

<?php $compVideo = ob_get_clean(); ?>