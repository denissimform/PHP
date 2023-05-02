<?php
// data source name
try {
    $hostname = "localhost";
    $username = "denis";
    $password = "Root@123";
    $database = "PHP";

    $dsn = "mysql:host=$hostname; dbname=$database";
    $conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "<br>Error:</br> " .  $e->getMessage();
}
