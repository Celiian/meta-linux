<?php ob_start() ?>

<nav class="wrapper--navbar">
    <div class="box--navbar">
        <div class="navbar--side">
            <div class="hamburger-button-home" onclick="closeMenu()">
                <img src="./front-end/assets/img/Logo/menu.svg" alt="" class="svg">
            </div>
            <a href=" index.php?name=Home">
                <button class="btn--logo--nav tooltip">
                    <div class="header-menu">
                        <p class="meta-rgb">Meta</p>
                        <p class="logo-header-menu">Tube </p>
                    </div>
                    <span class="tooltiptext"><?= $enJson['profile']['navBar']['tooltipMeta'] ?></span>
                </button>
            </a>
        </div>

        <form method="POST" action="index.php?name=SearchPage" class="navbar--center">
            <input type="text" name="searchBar" class="navbar__center__input"
                placeholder="<?= $enJson['profile']['navBar']['placeHolderSearch'] ?>" />
            <?php if ($homeBar != "SearchPage") { ?>
            <button class="navbar__center__search-btn" onclick="window.location.href = 'index.php?name=SearchPage';">
                <img src="./front-end/assets/img/Logo/search.svg" alt="" class="svg">
            </button>
            <?php } ?>
            <?php if ($homeBar == "SearchPage") { ?>
            <button class="navbar__center__search-btn" onclick="Search()">
                <img src="./front-end/assets/img/Logo/search.svg" alt="" class="svg">
            </button>
            <?php } ?>
        </form>

        <div class="navbar--side">
            <div class="btn--navbar--icon--upload--video tooltip">
                <?php if (empty($_SESSION['user'])) {
                ?>
                <a href="index.php?name=Login">
                    <span class="tooltiptext"><?= $enJson['profile']['navBar']['tooltipUploadNoConnect'] ?></span>
                    <?php  } else {
                        $id = $_SESSION['user']['id'];
                        $creator = getApi('channel/' . $id);
                        if ($creator != null) {
                        ?>
                    <a onclick="feature_open_upload_function()">
                        <span class="tooltiptext"><?= $enJson['profile']['navBar']['tooltipUpload'] ?></span>
                        <?php } else {
                            ?>
                        <a onclick="feature_open_accountCreator_function()">
                            <span class="tooltiptext"><?= $enJson['profile']['navBar']['tooltipUpload'] ?></span>
                            <?php  }
                    }
                            ?>
                            <img src="./front-end/assets/img/Logo/video.svg" alt="" class="svg">
                        </a>

            </div>

            <div class="btn--navbar--icon tooltip">
                <a href="/">
                    <img src="./front-end/assets/img/Logo/bell.svg" alt="" class="svg">
                </a>
                <span class="tooltiptext"><?= $enJson['profile']['navBar']['tooltipNotification'] ?></span>
            </div>

            <?php if (empty($_SESSION['user'])) { ?>
            <div class="btn--navbar--register">
                <a href="index.php?name=Login">Login</a>
            </div>
            <?php } else { ?>
            <div class="dropdown">
                <img src="data:image/png;base64,<?= $_SESSION['user']['profilePicture'] ?>" alt=""
                    onclick="OpenTheDoor()" class="dropbtn" width="35px" height="35px" />
                <div id="myDropdown" class="dropdown-content">
                    <div class="drop-profil">
                        <img src="data:image/jpg;base64,<?= $_SESSION['user']['profilePicture'] ?>" alt=""
                            class="dropbtn" width="50px" height="50px" />
                        <h3 class="userName"><?= $_SESSION['user']['username'] ?></h3>
                    </div>
                    <hr />
                    <div class=" drop-profil">
                        <label class="switch">
                            <span class="switch__span"><?= $enJson['profile']['navBar']['labelThemeDark'] ?> </span>
                            <input class="switch__input" type="checkbox" onclick="changeTheme()" value="0" />
                            <i class="switch__icon"></i>
                            <span class="switch__span"><?= $enJson['profile']['navBar']['labelThemeBright'] ?></span>
                        </label>
                    </div>
                    <!-- LINK TO CHANNEL -->
                    <a class="drop--element" onclick="feature_open_accountCreator_function()">
                        <div>
                            <img src="./front-end/assets/img/Logo/link.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonChannel'] ?>
                    </a>
                    <!-- LINK TO BUY A -->
                    <a href="/" class="drop-profil">
                        <div>
                            <img src="./front-end/assets/img/Logo/dollar-sign.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonSubscription'] ?>
                    </a>
                    <!-- YOUTUBE STUDIO -->
                    <a href="/" class="drop-profil">
                        <div>
                            <img src="./front-end/assets/img/Logo/tv.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonStudio'] ?>
                    </a>
                    <!-- LINK TO SIGN OUT -->
                    <a href="/back-end/actions/disconnect.php" class="drop-profil">
                        <div>
                            <img src="./front-end/assets/img/Logo/log-out.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonSignOut'] ?>
                    </a>
                    <!-- LINK TO GO ON PROFIL -->
                    <a href="index.php?name=Profile" class="drop-profil">
                        <div>
                            <img src="./front-end/assets/img/Logo/user.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonAccount'] ?>
                    </a>
                    <!-- LINK TO DATA -->
                    <a href="/" class="drop-profil">
                        <div>
                            <img src="./front-end/assets/img/Logo/database.svg" alt="" class="svg">
                        </div>
                        <?= $enJson['profile']['navBar']['buttonData'] ?>
                    </a>
                    <hr />
                    <a href="/" class="drop-profil"><?= $enJson['profile']['navBar']['buttonRestricted'] ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>
<script>
const dropprofil = document.getElementById("dropdown");

function OpenTheDoor() {
    document.getElementById("myDropdown").classList.toggle("show");
}

//Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches(".dropbtn")) {
        const dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
};
</script>

<?php $navBar = ob_get_clean(); ?>