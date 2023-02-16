<?php ob_start();
include './front-end/actions/trending.php';

$vids = getVids();

?>

<div class="explorer-container">
    <!-- Categories --START -->
    <div class="explorer-categories">
        <div class="categories-grid">
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/trending_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Trending'] ?>
                    </p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/music_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Music'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/movies_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Movies'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/live_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Live'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/gaming_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Gaming'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/news_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['News'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/sports_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Sports'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/learning_color_64_v1.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Learning'] ?></p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Explorer/fashion_and_beauty_color_64.png" alt="logo-category">
                    <p class="category-explorer-title"><?= $enJson['explore']['Fashion'] ?></p>
                </div>
            </div>
        </div>

    </div>
    <!-- Categories --END -->

    <!-- Creator Rise --START -->

    <div class="creator-rise">
        <div class="creator-rise-content">
            <div class="creator-rise-content-channel">
                <img src="/front-end/assets/img/Home/sadkitty.gif" alt="" class="creator-rise-content-channel-img">
                <p class="creator-rise-content-name">Robin</p>
                <p class="creator-rise-content-tag"><?= $enJson['explore']['rise'] ?></p>
            </div>
            <div class="creator-rise-grid">

                <div class="creator-rise-video">

                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?name=Watch">
                        <div class="home-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail" class="thumbnail" />
                            <div class="below-content">
                                <div class="below-content-img">
                                    <img src="/front-end/assets/img/Home/sadkitty.gif" alt=""
                                        class="video-channel-img" />
                                </div>
                                <div class="below-content-text">
                                    <strong class="video-title">I'M THE TITLE OF THE VIDEO</strong>
                                    <p class="video-channel-name">Name of the chanel</p>
                                    <div class="video-infos">
                                        <p class="video-number-views">200k views</p>
                                        <p class="video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <button class="prev hide-arrow"><img src="/front-end/assets/img/prev.svg" alt="prev" class="svg">
                    </button>
                </div>
                <button class="next"><img src="/front-end/assets/img/next.svg" alt="next" class="svg">
                </button>
            </div>
        </div>
        <!-- Creator Rise --END -->
        <div class="border-explore"></div>
    </div>

    <!-- Trending --START -->
    <div class="trending">
        <p class="trending-title"><?= $enJson['explore']['TrendingTitle'] ?></p>
        <?php
        for ($i = 0; $i < count($vids); $i++) {
            $videoDate = formatDate($vids[$i]->date)
        ?>
        <div class="trending-video-grid">
            <a href="index.php?name=Watch&id=<?= $vids[$i]->id ?>">
                <div class="trending-video-content">
                    <img src="data:image/png;base64,<?= $vids[$i]->thumbnail ?>" alt="thumbnail"
                        class="thumbnail-trend-explorer" />
                    <div class="next-content">
                        <strong class="explorer-video-title"><?= $vids[$i]->title ?></strong>
                        <div class="next-content-infos">
                            <p class="explorer-video-channel-name"><?= $vids[$i]->channelName; ?></p>
                            <p class="explorer-video-number-views"><?= $vids[$i]->viewNumber ?></p>
                            <p class="explorer-video-date"><?= $videoDate ?></p>
                        </div>
                        <p class="explorer-description">
                            <?= $vids[$i]->description ?>
                        </p>
                    </div>
                </div>
            </a>

            <?php
        }
            ?>
        </div>
    </div>
    <!-- Trending --END -->
</div>

<?php $pageName = ob_get_clean() ?>