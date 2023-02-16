<?php ob_start() ?>
<?php if ($pageName != 'Watch') {
?>
<div class="short-menu">
    <div class="sticky-menu">
        <div class="short-menu-items">
            <a href="index.php?name=Home" class="menu-link">
                <div class="nav-item-short">
                    <img src="./front-end/assets/img/Menu-svg/Home.svg" alt="" srcset="" class="nav-logo-short svg" />
                    <p>
                        <?= $enJson['menu']['nav-elements']['Home'] ?>
                    </p>
                </div>
            </a>
            <a href="index.php?name=Explorer" class="menu-link">
                <div class="nav-item-short">
                    <img src="./front-end/assets/img/Menu-svg/compass.svg" alt="" srcset=""
                        class="nav-logo-short svg" />
                    <p> <?= $enJson['menu']['nav-elements']['Explorer'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Subscriptions" class="menu-link">
                <div class="nav-item-short">
                    <img src="./front-end/assets/img/Menu-svg/sublogo.svg" alt="" srcset=""
                        class="nav-logo-short svg" />
                    <p> <?= $enJson['menu']['nav-elements']['Subscriptions'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Library" class="menu-link">
                <div class="nav-item-short">
                    <img src="./front-end/assets/img/Menu-svg/library.svg" alt="" srcset=""
                        class="nav-logo-short svg" />
                    <p><?= $enJson['menu']['nav-elements']['Library'] ?></p>
                </div>
            </a>
        </div>
    </div>
</div>
<?php } ?>
<div class="hamburger-menu-container">
    <div class="nav-body">
        <div class="nav-items">
            <a href="index.php?name=Home" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/Home.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['Home'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Explorer" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/compass.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['Explorer'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Subscriptions" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/sublogo.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['Subscriptions'] ?></p>
                </div>
            </a>
        </div>

        <div class="border"></div>
        <div class="nav-items">
            <a href="index.php?name=Library" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/library.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['Library'] ?></p>
                </div>
            </a>
            <a href="index.php?name=History" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/history.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['History'] ?></p>
                </div>
            </a>
            <a href="index.php?name=WatchLater" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/watchlater.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['WatchLaters'] ?></p>
                </div>
            </a>
            <a href="index.php?name=LikedVideo" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/like.svg" alt="" srcset="" class="nav-logo svg" />
                    <p class="nav-item-text"><?= $enJson['menu']['nav-elements']['LikedVideos'] ?></p>
                </div>
            </a>
            <div class="nav-item" onclick="ShowPlaylist()">
                <img src="./front-end/assets/img/Menu-svg/angle-down-solid.svg" alt="" srcset="" class="nav-logo svg" />
                <p class="nav-item-text">More</p>
            </div>
        </div>
        <div class="border"></div>
        <div class="menu-subscriptions">
            <strong class="title-subscriptions">
                <?= $enJson['menu']['titles']['subscriptions'] ?>
            </strong>
        </div>

        <div class="menu-subscriptions nav-items">
            <div class="border"></div>
            <strong class="title-others">
                <?= $enJson['menu']['titles']['others'] ?>
            </strong>
            <a href="index.php?name=MetaTubePremium">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/ytb-premium.svg" alt="MetaTube Premium" srcset=""
                        class="nav-logo" />
                    <p><?= $enJson['menu']['nav-elements']['MetaTube Premium'] ?></p>
                </div>
            </a>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/movies.svg" alt="Movies and Shows" srcset=""
                    class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/feed/storefront?bp=ogUCKAI%3D"><?= $enJson['menu']['nav-elements']['Movies and Shows'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/gaming-logo.svg" alt="Gaming" srcset="" class="nav-logo" />
                <p><a href="https://www.youtube.com/gaming"><?= $enJson['menu']['nav-elements']['Gaming'] ?></a></p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/live-logo.svg" alt="Live" srcset="" class="nav-logo svg" />
                <p><a
                        href="https://www.youtube.com/channel/UC4R8DWoMoI7CAwX8_LjQHig"><?= $enJson['menu']['nav-elements']['Live'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/music-logo.svg" alt="Music" srcset="" class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/channel/UC-9-kyTW8ZkZNDHQJ6FgpwQ"><?= $enJson['menu']['nav-elements']['Music'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/sports-logo.svg" alt="Sports" srcset="" class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/channel/UCEgdi0XIXXZ-qJOFPf4JSKw"><?= $enJson['menu']['nav-elements']['Sports'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/learning-logo.svg" alt="Learning" srcset=""
                    class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/channel/UCtFRv9O2AHqOZjjynzrv-xg"><?= $enJson['menu']['nav-elements']['Learning'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/news-logo.svg" alt="News" srcset="" class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/channel/UCYfdidRxbB8Qhf0Nx7ioOYw"><?= $enJson['menu']['nav-elements']['News'] ?></a>
                </p>
            </div>
            <div class="nav-item">
                <img src="./front-end/assets/img/Menu-svg/beauty-fashion-logo.svg" alt="Fashion & Beauty" srcset=""
                    class="nav-logo" />
                <p><a
                        href="https://www.youtube.com/channel/UCrpQ4p1Ql_hG8rKXIKM1MOQ"><?= $enJson['menu']['nav-elements']['Fashion & Beauty'] ?></a>
                </p>
            </div>
            <div class="border"></div>
            <div class="border"></div>
            <a href="index.php?name=Settings" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/Settings.svg" alt="" srcset="" class="nav-logo svg" />
                    <p><?= $enJson['menu']['nav-elements']['Settings'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Report" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/Report.svg" alt="" srcset="" class="nav-logo svg" />
                    <p><?= $enJson['menu']['nav-elements']['Report'] ?></p>
                </div>
            </a>
            <a href="index.php?name=Help" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/Help.svg" alt="" srcset="" class="nav-logo svg" />
                    <p><?= $enJson['menu']['nav-elements']['Help'] ?></p>
                </div>
            </a>
            <a href="index.php?name=SendFeedback" class="menu-link">
                <div class="nav-item">
                    <img src="./front-end/assets/img/Menu-svg/SendFeedback.svg" alt="" srcset="" class="nav-logo svg" />
                    <p><?= $enJson['menu']['nav-elements']['SendFeedback'] ?></p>
                </div>
            </a>
        </div>


        <div class="nav-items menu-footer">
            <div class="border"></div>
            <div class="links">
                <div class="primary-guide-links">

                    <a class="menu-text-footer"
                        href="https://about.youtube/"><?= $enJson['menu']['footer']['About'] ?></a>
                    <a class="menu-text-footer"
                        href="https://blog.youtube/"><?= $enJson['menu']['footer']['Press'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/howyoutubeworks/policies/copyright/"><?= $enJson['menu']['footer']['Copyright'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/t/contact_us/"><?= $enJson['menu']['footer']['Contact us'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/creators/"><?= $enJson['menu']['footer']['Creators'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/ads/"><?= $enJson['menu']['footer']['Advertise'] ?></a>
                    <a class="menu-text-footer"
                        href="https://developers.google.com/youtube"><?= $enJson['menu']['footer']['Developers'] ?></a>
                    <a class="menu-text-footer"
                        href="https://support.google.com/youtube/contact/FR_Complaints"><?= $enJson['menu']['footer']['Report hateful content under LCEN'] ?></a>

                </div>

                <div class="secondary-guide-links">

                    <a class="menu-text-footer"
                        href="https://www.youtube.com/t/terms"><?= $enJson['menu']['footer']['Terms'] ?></a>
                    <a class="menu-text-footer"
                        href="https://policies.google.com/privacy?hl=en"><?= $enJson['menu']['footer']['Privacy'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/howyoutubeworks/policies/community-guidelines/"><?= $enJson['menu']['footer']['Policy & Safety'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/howyoutubeworks/?utm_campaign=ytgen&utm_source=ythp&utm_medium=LeftNav&utm_content=txt&u=https%3A%2F%2Fwww.youtube.com%2Fhowyoutubeworks%3Futm_source%3Dythp%26utm_medium%3DLeftNav%26utm_campaign%3Dytgen"><?= $enJson['menu']['footer']['How YouTube works'] ?></a>
                    <a class="menu-text-footer"
                        href="https://www.youtube.com/new"><?= $enJson['menu']['footer']['Test new features'] ?></a>

                </div>

            </div>

        </div>
        <a class="menu-text-footer copyright">
            <?= $enJson['menu']['footer']['copyright'] ?>
        </a>
    </div>
</div>

<?php $menu = ob_get_clean() ?>