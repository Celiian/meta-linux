<?php

include_once "./back-end/actions/UploadVideo.php";

if (isset($_POST['but_upload'])) {
   upload();
}
?>

<?php ob_start() ?>
<div class="feature-channel-modal-background"></div>
<div class="modal-container-channel">
    <div class="feature-channel-modal-overlay-uploadVideo"></div>
    <div class="modal-channel">
        <button class="feature-channel-modal-close" onclick="feature_remove_upload_function()">&times;</button>
        <h1 id="feature-channel-modal-container-title">Upload</h1>
        <form method="post" action="" enctype='multipart/form-data'>
            <div class="wrapper-modal-channel">
                <div>
                    <label class="label-file" for="video">Choose a video</label>
                    <input type='file' name='video' accept="video/mp4, video/x-m4v, video/*" />
                </div>
                <div>
                    <label class="label-file" for="title">Enter the title</label>
                    <input class="input--register" type="text" name="title" maxlength="30">
                </div>
                <div>
                    <label class="label-file" for="title">Enter the description</label>
                    <input class="input--register" type="text" name="description" maxlength="255">
                </div>
                <div class="">
                    <label class="label-file" for="video">Choose a thumbnail</label>
                    <input type='file' name='thumbnail' accept="image/png, image/gif, image/jpeg , image/webp" />
                </div>
                <input class="btn--register" type='submit' value='Upload' name='but_upload'>
            </div>

        </form>
        <div>

            <!-- Upload response -->
            <?php
         if (isset($_SESSION['message'])) {
            var_dump($_SESSION['message']);
            unset($_SESSION['message']);
         }
         ?>

        </div>
    </div>

</div>

<?php $channelVideoUpload = ob_get_clean() ?>