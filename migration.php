<?php

require_once "./vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$migration = new Application\Database\Migration\Migrate();

echo "=== Migrating users table ===" . PHP_EOL;
$migration->users();
echo "==== users table created ====" . PHP_EOL;

//


echo "=== Migrating content table ===" . PHP_EOL;
$migration->content();
echo "==== content table created ====" . PHP_EOL;

//


echo "=== Migrating progress table ===" . PHP_EOL;
$migration->progress();
echo "==== progress table created ====" . PHP_EOL;

//


echo "=== Migrating quizzes table ===" . PHP_EOL;
$migration->quizzes();
echo "==== quizzes table created ====" . PHP_EOL;

//


echo "=== Migrating questions table ===" . PHP_EOL;
$migration->questions();
echo "==== questions table created ====" . PHP_EOL;

//


echo "=== Migrating answers table ===" . PHP_EOL;
$migration->answers();
echo "==== answers table created ====" . PHP_EOL;
