<?php

$dbHost = 'localhost';
$dbPort = 5432;
$dbName = 'todolist';
$dbUsername = 'postgres';
$dbPassword = null;
$dbOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUsername, $dbPassword, $dbOptions);

/*
  Cette option assure que les tableaux associatifs retournés par fetch et fetchAll
  ne contiennent que des clés correspondant aux noms de colonnes.
  Autrement, ils contiendront aussi des clés 0, 1, 2, etc.
*/
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

?>