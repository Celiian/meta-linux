<?php

function getVids()
{
    $vids = getApi('video/topView');
    return $vids;
}