<?php

function formatDate($date)
{
    $dateAndTime = explode("T", $date);

    $currentDate =  date_create(date('y-m-d'));

    $vidDate = date_create($dateAndTime[0]);


    $interval = date_diff($vidDate, $currentDate);

    $time = explode(":", $dateAndTime[1]);



    if ((int)$time[0] == 23 && (int)$time[1] < 59 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
        return (int)$time[0] . " hours";
    } elseif ((int)$time[0] == 00 && (int)$time[1] < 59 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
        return (int)$time[1] . " minutes";
    } elseif ((int)$time[0] == 01 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
        return 1 . " hour";
    } else {
        if ($interval->d > 30 && $interval->y < 1 && $interval->m > 1) {
            return $interval->m . " months";
        } elseif ($interval->d < 7 && $interval->m == 0 && $interval->y < 1) {
            return $interval->d . " days";
        } elseif ($interval->y == 1) {
            return $interval->y . " year";
        } elseif ($interval->y > 1) {
            return $interval->y . " years";
        } elseif ($interval->d > 30 && $interval->y < 1 && $interval->m == 1) {
            return $interval->m . " month";
        } elseif ($interval->d == 1 && $interval->m == 0 && $interval->y < 1) {
            return $interval->d . " day";
        } elseif ($interval->d >= 7 && $interval->m < 1 && $interval->d < 14) {
            return 1 . " week";
        } elseif ($interval->d >= 14 && $interval->m < 1 && $interval->d < 21) {
            return 2 . " weeks";
        } elseif ($interval->d >= 21 && $interval->m < 1 && $interval->d < 28) {
            return 3 . " weeks";
        } elseif ($interval->d >= 28 && $interval->m < 1) {
            return 1 . " month";
        } else {
            return $interval->d;
        }
    }
}