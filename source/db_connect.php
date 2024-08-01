<?php

$sname = "db";  // Use the service name instead of localhost
$unmae = "user";  // Correct username as per your docker-compose.yml
$password = "pass";

$db_name = "mydb";  // Match the database name as defined in docker-compose.yml

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection Failed miserably!";
}
