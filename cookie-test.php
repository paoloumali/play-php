<?php
//curl -i -c ./cookie.txt -b ./cookie.txt http://localhost:9001/cache.php

$cookie_expires = time()+60*60*24; // a day
$cookie_path = '/cookie-test.php';
$cookie_domain = $_SERVER['SERVER_NAME'];

$current_day = date('j-l');
$cookied_day = isset($_COOKIE["c_last_visit_day"])
    ? $_COOKIE["c_last_visit_day"]
    : '';

if ($cookied_day != $current_day) {
    setcookie('c_last_visit_day', $current_day, $cookie_expires, $cookie_path, $cookie_domain);
}

$last_visit_day = empty($cookied_day)
    ? explode('-', $current_day)[1]
    : explode('-', $_COOKIE["c_last_visit_day"])[1];

$html = <<<EOT
<pre>
cookied_day: $cookied_day
current_day: $current_day
last visit day: $last_visit_day
</pre>

EOT;

echo $html;
