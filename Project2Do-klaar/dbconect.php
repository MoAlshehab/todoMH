<?php

$dbhost = "localhost";
$dbname = "tododb";
$user = "root";
$pass = "";
try {
    $database = new PDO("mysql:host=$dbhost;dbname=$dbname",$user,$pass);
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>