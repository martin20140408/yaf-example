<?php
define("APPLICATION_PATH", realpath(dirname(__FILE__)));

$app = new \Yaf\Application(APPLICATION_PATH . "/conf/application.ini", ini_get('yaf.environ'));
$app->bootstrap()->run();

