<?php ob_start();

include_once './back-end/actions/Timeline.php';
include_once './back-end/actions/Date.php';

$vids = getVids(12);

?>
<div class="home-videos-grid">
    <?php
    for ($i = 0; $i < count($vids); $i++) {
        $videoDate = formatDate($vids[$i]->date);
    ?>
    <a href="index.php?name=Watch&id=<?= $vids[$i]->id ?>" class="video-link-home">
        <div class="home-video-content">
            <img src="data:image/png;base64,<?= $vids[$i]->thumbnail ?>" alt="thumbnail" class="thumbnail" />
            <div class="below-content">
                <div class="below-content-img">
                    <img src="data:image/png;base64,<?= $vids[$i]->channelProfilePicture ?>" alt=""
                        class="video-channel-img" />
                </div>
                <div class="below-content-text">
                    <strong class="video-title"><?= $vids[$i]->title ?></strong>
                    <p class="video-channel-name"><?= $vids[$i]->channelName; ?></p>
                    <div class="video-infos">
                        <p class="video-number-views"><?= $vids[$i]->viewNumber ?> <?= $enJson['home']["views"] ?></p>
                        <p class="video-date"> <?= $videoDate ?> <?= $enJson['home']["date"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <?php
    }
    ?>

</div>

<script>
$(function() {
    <?php
        if (isset($_SESSION['toastr'])) {
            echo 'toastr.' . $_SESSION['toastr']['type'] . '("' . $_SESSION['toastr']['message'] . '", "' . $_SESSION['toastr']['title'] . '")';
            unset($_SESSION['toastr']);
        }
        ?>
});
</script>
<?php $pageName = ob_get_clean() ?>