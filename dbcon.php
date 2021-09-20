<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('recipe-php-firebase-adminsdk-d28lj-f6e1952d5e.json')
    ->withDatabaseUri('https://recipe-php-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();


