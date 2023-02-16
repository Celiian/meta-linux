<?php
include './front-end/actions/CreateChannel.php';
if (isset($_POST['channelCreated'])) {
    createChannel();
}


ob_start() ?>


<div class="bloc-modal">
    <div class="feature-channel-modal-overlay-channel"></div>
    <div class="modal-card">
        <div class="title">
            <p class="title-create"><?php echo $enJson['creation']['createTitle'] ?></p>
        </div>
        <div class="feature-channel-modal-profile">
            <form method="post" enctype='multipart/form-data'>
                <label for="channelImg"><?php echo $enJson['creation']['Import'] ?></label>
                <input class="btn-image" type="file" name="channelImg">
                <label id="info_name">Nom :</label>
                <input class="feature-channel-modal-username" type="text" name="channelName">
                <input type="submit" name="channelCreated" class="btn-create"
                    value="<?php echo $enJson['creation']['create'] ?>">
            </form>
        </div>
        <div class="feature-channel-control-btn">
            <button class="btn-cancel"
                onclick="feature_remove_accountCreator_function()"><?php echo $enJson['creation']['cancel'] ?></button>
        </div>


    </div>

</div>


<?php $channelCreation = ob_get_clean() ?>