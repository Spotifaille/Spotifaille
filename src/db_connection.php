<?php
require_once __DIR__ . '/vendor/autoload.php';

// connection URI
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

$mongoUri = "mongodb://$dbUser:$dbPassword@db:27017/$dbName";

// connect to the database
$mongoClient = new MongoDB\Client($mongoUri);
$collection = $mongoClient->$dbName->music;

// get all the tracks
$tracks = $collection->find();
?>