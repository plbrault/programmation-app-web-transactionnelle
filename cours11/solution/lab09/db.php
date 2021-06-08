<?php

$dbHost = 'localhost';
$dbPort = 5432;
$dbName = 'Series';
$dbUsername = 'postgres';
$dbPassword = null;
$dbOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUsername, $dbPassword, $dbOptions);

?>