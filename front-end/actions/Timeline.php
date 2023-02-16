<?php

function getVids($number)
{
    $vids = getApi('timeline/video/' . $number);
    return $vids;
}

function redirect()
{
    header('location: index.php?name=Home');
}

$path_key = "/Users/celian/Documents/MetaTube/storage/";


function getCreator($id)
{
    $creator = getApi('channel/' . $id);
    return $creator;
}

if (isset($_SESSION['user'])) {
    $creator = getCreator($_SESSION['user']['id']);
    $_SESSION['channel'] = $creator;
}
