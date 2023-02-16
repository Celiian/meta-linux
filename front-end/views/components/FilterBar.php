<?php ob_start();
?>

<div class="filter-bar-container">
    <ul class="list-filter">
        <li class="filters-element">
            <a class="filter-text" href="/index.php?name=Home">All</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Video test</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Anime</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Sports</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Apple</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Mix</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Recently Uploaded Videos</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Live</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">News</a>
        </li>
        <li class="filters-element">
            <a class="filter-text" href="">Watched</a>
        </li>
    </ul>

</div>

<?php $filterbar = ob_get_clean() ?>