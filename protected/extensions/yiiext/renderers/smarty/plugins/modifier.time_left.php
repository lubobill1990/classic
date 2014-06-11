<?php
function smarty_modifier_time_left($full_time)
{
    $seconds_gap = strtotime($full_time) - time();
    $seconds = $seconds_gap;
    if ($seconds_gap < 0) {
        $seconds = -$seconds_gap;
    }
    $minutes = $seconds / 60 % 60;
    $hours = intval($seconds / 3600);
    $show_time = "$hours hours $minutes minutes";
    return $show_time;
}