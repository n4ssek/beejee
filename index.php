<?php

define('ROOT', dirname(__FILE__));

include_once ROOT . '/components/Router.php';

$router = new Router();
$router->run();