<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $enJson['global']['title'] ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./front-end/assets/js/toastr.min.js"></script>
    <script src="./front-end/assets/js/toastr.js.map"></script>


    <link rel="shortcut icon" href="./front-end/assets/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./front-end/assets/css/global.css">
    <link rel="stylesheet" href="./front-end/assets/css/NavBar.css">
    <link rel="stylesheet" href="./front-end/assets/css/register.css">
    <link rel="stylesheet" href="./front-end/assets/css/Profile.css">
    <link rel="stylesheet" href="./front-end/assets/css/Menu.css">
    <link rel="stylesheet" href="./front-end/assets/css/Home.css">
    <link rel="stylesheet" href="./front-end/assets/css/channel.css">
    <link rel="stylesheet" href="./front-end/assets/css/upload.css">
    <link rel="stylesheet" href="./front-end/assets/css/channelPage.css">
    <link rel="stylesheet" href="./front-end/assets/css/Home.css">
    <link rel="stylesheet" href="./front-end/assets/css/toastr.css">
    <link rel="stylesheet" href="./front-end/assets/css/Explorer.css">
    <link rel="stylesheet" href="./front-end/assets/css/FilterBar.css">
    <link rel="stylesheet" href="./front-end/assets/css/404.css">
    <link rel="stylesheet" href="./front-end/assets/css/SearchPage.css">
    <link rel="stylesheet" href="./front-end/assets/css/Watch.css">
</head>

<body>
    <?= $channelVideoUpload ?>

    <?php if ($pageName != "404") {
        echo $channelCreation;
        echo $navBar;
    } ?>
    <div class="content">
        <div class="menus">
            <?php if ($pageName != "404") {
                echo $menu;
            } ?>
        </div>
        <div class="page-content">
            <div class="page">
                <?php if ($homeBar == "Home") {
                    echo $filterbar;
                } ?>
                <?php if ($pageName != "404") {
                    echo $pageName;
                } ?>
            </div>
        </div>
    </div>


    </div>
    <!-- Add js library and script here -->

    <script src="./front-end/assets/js/SearchPage.js"></script>
    <script src="/front-end/assets/js/feature-channel-modal-createCreator.js"></script>
    <script src="/front-end/assets/js/script-menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="/front-end/assets/js/script-explorer.js"></script>
    <script src="/front-end/assets/js/script-watch.js"></script>
    <script src="./front-end/assets/js/toastr.min.js"></script>
    <script src="./front-end/assets/js/toastr.js.map"></script>
    <script src="./front-end/assets/js/SearchPage.js"></script>

    <script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    </script>


</body>

</html>