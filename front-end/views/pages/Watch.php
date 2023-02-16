<?php
ob_start();
include_once "./back-end/actions/WatchVideo.php";
$video_id = $_GET["id"];
// $path = $path_key . $video_id;
$vid = getVid($video_id)[0];

$comments = getComments($video_id);

$source = "http://10.160.33.111:8082/watch/" . $video_id;

$tags = "";
$description = $vid->description;
if ($description != null) {
    $descriptionExploded = explode(' ', $description);
    foreach ($descriptionExploded as $word) {
        if (substr($word, 0, 1) == "#") {
            $tags = $tags . ' ' . $word;
        }
    }
}
if (isset($_POST['com'])) {
    postComment($_POST['com'], $_SESSION['user']['id'], $video_id);
    if (isset($_SESSION['comment'])) {
        $_SESSION['comment'];
    }
}
$_SESSION['lastPage'] = "index.php?name=Watch&id=" . $video_id;

if (isset($video_id)) {
    view($video_id);
}
?>

<div class="watch-content">
    <div class="lector">
        <div class="video-lector">
            <div class="container-watch">
                <div class="video-container" id="video-container">
                    <div class="playback-animation" id="playback-animation">
                        <svg class="playback-icons lectorsvg">
                            <use class="hidden" href="#play-icon"></use>
                            <use href="#pause"></use>
                        </svg>
                    </div>

                    <video controls class="video" id="video" preload="metadata" poster="<?= $vid->thumbnail ?>">
                        <source src=<?php echo $source ?> type="video/mp4">
                        </source>
                    </video>

                    <div class="video-controls hidden" id="video-controls">
                        <div class="video-progress">
                            <progress id="progress-bar" value="0" min="0"></progress>
                            <input class="seek" id="seek" value="0" min="0" type="range" step="1">
                            <div class="seek-tooltip" id="seek-tooltip">00:00</div>
                        </div>

                        <div class="bottom-controls">
                            <div class="left-controls">
                                <button class="lectorbutton" data-title="Play (k)" id="play">
                                    <svg class="playback-icons lectorsvg">
                                        <use href="#play-icon"></use>
                                        <use class="hidden" href="#pause"></use>
                                    </svg>
                                </button>

                                <div class="volume-controls">
                                    <button data-title="Mute (m)" class="volume-button lectorbutton" id="volume-button">
                                        <svg class="lectorsvg">
                                            <use class="hidden" href="#volume-mute"></use>
                                            <use class="hidden" href="#volume-low"></use>
                                            <use href="#volume-high"></use>
                                        </svg>
                                    </button>

                                    <input class="volume" id="volume" value="1" data-mute="0.5" type="range" max="1"
                                        min="0" step="0.01">
                                </div>

                                <div class="time">
                                    <time id="time-elapsed">00:00</time>
                                    <span> / </span>
                                    <time id="duration">00:00</time>
                                </div>
                            </div>

                            <div class="right-controls">
                                <button data-title="Loop (l)" class="loop-button lectorbutton" id="loop-button">
                                    <svg version="1.1" class="lectorsvg" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="545.487px"
                                        height="545.487px" viewBox="0 0 545.487 545.487"
                                        style="enable-background:new 0 0 545.487 545.487;" xml:space="preserve">
                                        <g>
                                            <path d="M545.487,269.909v7.995c0,65.811-53.546,119.338-119.344,119.338H331.24c0,0,22.023-14.931,17.235-46.589h77.668
		c40.122,0,72.761-32.633,72.761-72.755v-7.995c0-40.125-32.645-72.761-72.761-72.761h-106.85l0,0h-28.176l16.443,41.632
		c0.579,1.469,0.106,3.142-1.152,4.091c-1.266,0.957-3.003,0.951-4.256-0.018l-86.123-66.198c-0.872-0.665-1.374-1.696-1.374-2.784
		c0-1.09,0.502-2.125,1.374-2.79l86.123-66.204c0.632-0.496,1.389-0.733,2.146-0.733c0.745,0,1.489,0.231,2.116,0.707
		c1.259,0.952,1.731,2.627,1.146,4.093l-16.432,41.636h28.17v-0.006h106.844C491.941,150.562,545.487,204.104,545.487,269.909z
		 M243.34,302.628c-1.253-0.964-2.991-0.97-4.256-0.012c-1.259,0.951-1.731,2.63-1.149,4.09l16.438,41.63h-28.174l0,0H119.344
		c-40.122,0-72.758-32.646-72.758-72.762v-7.997c0-40.117,32.642-72.759,72.758-72.759h77.667
		c-4.788-31.649,17.233-46.586,17.233-46.586h-94.9C53.543,148.233,0,201.767,0,267.578v7.997
		c0,65.811,53.543,119.345,119.344,119.345h106.843v-0.007h28.173l-16.438,41.63c-0.582,1.472-0.109,3.15,1.149,4.096
		c0.63,0.479,1.375,0.71,2.119,0.71c0.75,0,1.513-0.236,2.143-0.733l86.12-66.2c0.875-0.668,1.377-1.696,1.377-2.79
		c0-1.1-0.502-2.122-1.377-2.79L243.34,302.628z" />
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>
                                    </img>
                                </button>
                                <button data-title="PIP (p)" class="pip-button lectorbutton" id="pip-button">
                                    <svg class="lectorsvg">
                                        <use href="#pip"></use>
                                    </svg>
                                </button>
                                <button data-title="Full screen (f)" class="fullscreen-button lectorbutton"
                                    id="fullscreen-button">
                                    <svg class="lectorsvg">
                                        <use href="#fullscreen"></use>
                                        <use href="#fullscreen-exit" class="hidden"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <svg style="display: none" class="lectorsvg">
                <defs>
                    <symbol id="pause" viewBox="0 0 24 24">
                        <path d="M14.016 5.016h3.984v13.969h-3.984v-13.969zM6 18.984v-13.969h3.984v13.969h-3.984z">
                        </path>
                    </symbol>

                    <symbol id="play-icon" viewBox="0 0 24 24">
                        <path d="M8.016 5.016l10.969 6.984-10.969 6.984v-13.969z"></path>
                    </symbol>

                    <symbol id="volume-high" viewBox="0 0 24 24">
                        <path
                            d="M14.016 3.234q3.047 0.656 5.016 3.117t1.969 5.648-1.969 5.648-5.016 3.117v-2.063q2.203-0.656 3.586-2.484t1.383-4.219-1.383-4.219-3.586-2.484v-2.063zM16.5 12q0 2.813-2.484 4.031v-8.063q1.031 0.516 1.758 1.688t0.727 2.344zM3 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6z">
                        </path>
                    </symbol>

                    <symbol id="volume-low" viewBox="0 0 24 24">
                        <path
                            d="M5.016 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6zM18.516 12q0 2.766-2.531 4.031v-8.063q1.031 0.516 1.781 1.711t0.75 2.32z">
                        </path>
                    </symbol>

                    <symbol id="volume-mute" viewBox="0 0 24 24">
                        <path
                            d="M12 3.984v4.219l-2.109-2.109zM4.266 3l16.734 16.734-1.266 1.266-2.063-2.063q-1.547 1.313-3.656 1.828v-2.063q1.172-0.328 2.25-1.172l-4.266-4.266v6.75l-5.016-5.016h-3.984v-6h4.734l-4.734-4.734zM18.984 12q0-2.391-1.383-4.219t-3.586-2.484v-2.063q3.047 0.656 5.016 3.117t1.969 5.648q0 2.203-1.031 4.172l-1.5-1.547q0.516-1.266 0.516-2.625zM16.5 12q0 0.422-0.047 0.609l-2.438-2.438v-2.203q1.031 0.516 1.758 1.688t0.727 2.344z">
                        </path>
                    </symbol>

                    <symbol id="fullscreen" viewBox="0 0 24 24">
                        <path
                            d="M14.016 5.016h4.969v4.969h-1.969v-3h-3v-1.969zM17.016 17.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 9.984v-4.969h4.969v1.969h-3v3h-1.969zM6.984 14.016v3h3v1.969h-4.969v-4.969h1.969z">
                        </path>
                    </symbol>

                    <symbol id="fullscreen-exit" viewBox="0 0 24 24">
                        <path
                            d="M15.984 8.016h3v1.969h-4.969v-4.969h1.969v3zM14.016 18.984v-4.969h4.969v1.969h-3v3h-1.969zM8.016 8.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 15.984v-1.969h4.969v4.969h-1.969v-3h-3z">
                        </path>
                    </symbol>

                    <symbol id="pip" viewBox="0 0 24 24">
                        <path
                            d="M21 19.031v-14.063h-18v14.063h18zM23.016 18.984q0 0.797-0.609 1.406t-1.406 0.609h-18q-0.797 0-1.406-0.609t-0.609-1.406v-14.016q0-0.797 0.609-1.383t1.406-0.586h18q0.797 0 1.406 0.586t0.609 1.383v14.016zM18.984 11.016v6h-7.969v-6h7.969z">
                        </path>
                    </symbol>
                </defs>
            </svg>

            <div class="below-video-content">
                <div class="video-informations">
                    <p class="tags"><?= $tags ?>
                    </p>
                    <p class="watch-vid-title">
                        <?= $vid->title ?>
                    </p>
                    <div class="video-views-date-desc">
                        <div class="video-date-views">
                            <p class="watch-video-views"> <?= $vid->viewNumber ?> views
                            </p>
                        </div>

                        <p class="video-description"> <?= $vid->description ?></p>
                    </div>
                    <div class="video-icons">

                        <div class="video-icon like-button" onclick="like()">
                            <form action="/back-end/actions/InterAction.php" method="post" class="interaction">
                                <?php if (isset($_SESSION['connect'])) { ?>
                                <button>
                                    <img src="/front-end/assets/img/like.svg" alt="" class="like-svg svg">
                                    <input type="hidden" name="idVideo" value="<?= $vid->id ?>">
                                    <input type="hidden" name="idUser" value="<?= $_SESSION['user']['id'] ?>">
                                </button>
                                <?php } else { ?>
                                <a href="index.php?name=Login">
                                    <img src="/front-end/assets/img/like.svg" alt="" class="like-svg svg">
                                </a>
                                <?php } ?>
                            </form>
                            <p><?= $vid->likeNumber ?></p>
                        </div>
                        <div class="video-icon dislike-button">
                            <form action="/back-end/actions/InterAction.php" method="post" class="interaction">
                                <?php if (isset($_SESSION['connect'])) { ?>
                                <button>
                                    <img src="/front-end/assets/img/dislike.svg" alt="" class="dislike-svg svg">
                                    <input type="hidden" name="dislike" value="<?= $vid->id ?>">
                                    <input type="hidden" name="idUser" value="<?= $_SESSION['user']['id'] ?>">
                                </button>
                                <?php } else { ?>
                                <a href="index.php?name=Login">
                                    <img src="/front-end/assets/img/dislike.svg" alt="" class="dislike-svg svg">

                                </a>
                                <?php } ?>
                            </form>
                            <p><?= $vid->dislikeNumber ?></p>
                        </div>
                        <div class="video-icon">
                            <img src="/front-end/assets/img/share.svg" alt="" class="svg">
                            <p>Share</p>
                        </div>
                        <div class="video-icon">
                            <img src="/front-end/assets/img/download.svg" alt="" class="svg">
                            <a href="index.php?name=MetaTubePrenium">
                                <p>Download</p>
                            </a>
                        </div>
                        <div class="video-icon">
                            <img src="/front-end/assets/img/cut.svg" alt="" class="svg">
                            <p>Clip</p>
                        </div>
                        <div class="video-icon">
                            <img src="/front-end/assets/img/playlist.svg" alt="" class="svg">
                            <p>Save</p>
                        </div>
                        <div class="video-icon">
                            <img src="/front-end/assets/img/dot.svg" alt="" class="svg">
                        </div>

                    </div>
                </div>
                <div class="below-content-box">
                    <div class="channel-watch box-below">
                        <img src="data:image/png;base64,<?= $vid->channelProfilePicture ?>" alt="" width="36px"
                            height="36px">
                        <div class="watch-chan-infos">
                            <div class="video-watch-name-channel"><?= $vid->channelName ?></div>
                            <div class="video-watch-subscribers"><?= $vid->subscriberNumber ?></div>
                        </div>
                        <?php if (isset($_SESSION['connect'])) { ?>
                        <button class="sub-button-watch">SUBSCRIBE</button>
                        <?php } else { ?>
                        <a class="sub-button-watch-link" href="index.php?name=Login">SUBSCRIBE</a>
                        <?php } ?>
                        <img src=" /front-end/assets/img/Logo/bell.svg" alt="" class="bell-below svg">
                    </div>

                    <div class="comments-video box-below">
                        <div class="watch-chan-infos comment-box">
                            <div class="video-watch-name-channel">Top Comment</div>
                            <div class="video-watch-subscribers"></div>
                        </div>
                        <img src="/front-end/assets/img/bonhomme-baton.jpeg" alt="" width="25px" height="25px"
                            style="border-radius: 50%; margin-left:5px;">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae sunt perspiciatis iure commodi
                            itaque officiis nihil quaerat incidunt eos, assumenda illum at! Provident recusandae error
                            sequi quaerat nisi corporis architecto?</p>
                    </div>
                </div>
            </div>
            <div class="comments-suggestions">
                <div class="comments-section">
                    <div class="comments-section-infos">
                        <p class="comments-section-number">27,400 Comments</p>
                    </div>
                    <form method="post">
                        <div class="add-comment">
                            <?php if (isset($_SESSION['connect'])) { ?>
                            <div class="add-comment-line">
                                <img src="data:image/png;base64,<?= $_SESSION['user']['profilePicture'] ?>" alt=""
                                    style="border-radius:50%; width:40px; height:40px;">
                                <input type="text" name="com" class="add-comment-text" cols=" 30" rows="10"
                                    placeholder="Add a comment.."
                                    <?php if (isset($_SESSION['comment'])) {
                                                                                                                                                ?>
                                    value="<?= $_SESSION['comment']; ?>"
                                    <?php }
                                                                                                                                                                                        ?> />
                            </div>
                            <?php } else { ?>
                            <div class="add-comment-line">
                                <img src="" alt="" style="border-radius:50%; width:40px; height:40px;">
                                <input type="text" name="comNotLogin" class="add-comment-text" cols=" 30" rows="10"
                                    placeholder="Add a comment.." />
                            </div>
                            <?php } ?>
                            <div class="add-comment-buttons">
                                <?php if (isset($_SESSION['connect'])) { ?>
                                <button class="cancel-button">CANCEL</button>
                                <input type="submit" class="comment-button" value="COMMENT">
                                <?php } else {
                                    if (isset($_POST['comNotLogin'])) {
                                        $_SESSION['comment'] = $_POST['comNotLogin'];
                                    }
                                ?>
                                <a class="cancel-button-link" href="index.php?name=Login">CANCEL</a>
                                <a href="index.php?name=Login">
                                    <input type="submit" class="comment-button" value="COMMENT">
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>

                    <?php for ($i = 0; $i < count($comments); $i++) { ?>

                    <div class="watch-comments">
                        <div class="comments-name">
                            <img src="data:image/png;base64,<?= $comments[$i]->channelProfilePicture ?>" alt=""
                                class="img-comment-user" style="border-radius:50%; width:40px; height:40px;">
                            <p class="name-comment-user"><?= $comments[$i]->channelName ?></p>
                            <p class="date-comments"><?= $comments[$i]->date ?></p>
                        </div>
                        <p class="comments-content">
                            <?= $comments[$i]->content ?>

                        </p>
                        <div class="comment-likes">
                            <div class="comment-like">
                                <img src="/front-end/assets/img/like.svg" alt="like" class="comment-like-img svg">
                                <p class="comment-like-number"><?= $comments[$i]->likeNumber ?></p>
                            </div>
                            <div class="comment-dislike">
                                <img src="/front-end/assets/img/dislike.svg" alt="dislike"
                                    class="comment-dislike-img svg">
                                <p class="comment-disike-number"><?= $comments[$i]->dislikeNumber ?></p>
                            </div>
                        </div>
                        <button class="comments-reply">
                            <img src="/front-end/assets/img/arrow-reply.svg" alt="" class="svg">
                            <p class="replies-comment"> View <?= $comments[$i]->responseNumber ?> replies</p>
                        </button>
                    </div>
                </div>
                <?php } ?>

                <div class="suggestions-video">
                    <a href="index.php?name=Watch">
                        <div class="watch-video-content">
                            <img src="/front-end/assets/img/Home/thumbnail.png" alt="thumbnail"
                                class="thumbnail-watch" />
                            <div class="watch-next-content">
                                <strong class="watch-watch-vid-title">I'M THE TITLE OF THE VIDEO</strong>
                                <div class="watch-content-infos">
                                    <p class="watch-video-channel-name">Name of the chanel</p>
                                    <div class="watch-video-infos">
                                        <p class="watch-video-number-views">200k views</p>
                                        <p class="watch-video-date">2 weeks ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>


        <?php $pageName = ob_get_clean() ?>