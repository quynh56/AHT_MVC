<?php

namespace AHT_MVC1\Webroot;
use AHT_MVC1\Router;
use AHT_MVC1\Config\Core;
use AHT_MVC1\Request;
use AHT_MVC1\Dispatcher;

require __DIR__ . '/../vendor/autoload.php';

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


$dispatch = new Dispatcher();
$dispatch->dispatch();

?>