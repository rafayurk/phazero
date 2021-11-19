<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
    ->withServiceAccount('phazero-6afa0-firebase-adminsdk-fxqp9-b9548de553.json')
    ->withDatabaseUri('https://phazero-6afa0-default-rtdb.asia-southeast1.firebasedatabase.app/');

    $database = $factory->createDatabase();
    $auth = $factory->createAuth();

?>