<?php

require_once "./vendor/autoload.php";

use Application\Database\Migration\Migrate;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$migration = new Migrate();
