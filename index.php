<?php
require __DIR__ . '/vendor/autoload.php';

$f3 = \Base::instance();
$f3->config('app/config.ini');

$f3->run();
?>