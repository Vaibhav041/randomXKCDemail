<?php
$interval = 2;
set_time_limit(0);

while (true) {
    $now = time();
    include("sendMail.php");
    sleep($interval*05-(time() - $now));
}
?>