<?php
// libraries required
require 'vendor/autoload.php';


// connection URI
// $mongoUri = "mongodb://$dbUser:$dbPassword@db:27017/$dbName";
// echo "DB_USER: $dbUser<br>";
// echo "DB_PASSWORD: $dbPassword<br>";
// echo "DB_NAME: $dbName<br>";
// echo "MongoDB URI: $mongoUri<br>";

// connect to the database
$mongoClient = new MongoDB\Client(getenv('MONGO_URI'));
$collection = $mongoClient->$dbName->music;

// get all the tracks
$tracks = $collection->find();
?>