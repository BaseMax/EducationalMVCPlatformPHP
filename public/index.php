<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Application\Facades\Application;

define("LOADED", true);

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new Application();

include_once dirname(__DIR__) . "/App/api.php";

echo $app->run();
