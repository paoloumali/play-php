<?php
//curl -i -c ./cookie.txt -b ./cookie.txt http://localhost:9001/cache.php

$current_day = date('j-l');

$cached_day = isset($_COOKIE["c_last_visit_day"]) ? $_COOKIE["c_last_visit_day"] : null;

if ($cached_day != $current_day) {
    // set a cookie for 1 day
    setcookie('c_last_visit_day', $current_day, time()+60*60*24, '/cache.php', 'localhost');
}

echo 'cached_day:'.$cached_day."\n".'<br>';
echo 'current_day:'.$current_day."\n".'<br>';
echo 'test cache'."\n".'<br>';
