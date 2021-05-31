<?php

$bdd_hote = 'localhost';
$bdd_port = 5432;
$bdd_nomBD = 'Contacts';
$bdd_nomUtilisateur = 'postgres';
$bdd_motDePasse = null;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

$bdd = new PDO("pgsql:host=$bdd_hote;port=$bdd_port;dbname=$bdd_nomBD", $bdd_nomUtilisateur, $bdd_motDePasse, $options);

?>