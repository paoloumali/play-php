<?php

$current_day = date('j-l');

$cached_day = isset($_COOKIE["c_last_visit_day"]) ? $_COOKIE["c_last_visit_day"] : null;

if ($cached_day != $current_day) {
    // set a cookie for 1 day
    setcookie('c_last_visit_day', $current_day, time()+60*60*24, '/cache.php', 'play-php.paoloumali.com', true);
}

echo $cached_day;
echo $current_day;

echo 'test cache';
