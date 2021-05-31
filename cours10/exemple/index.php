<?php
/*
  Utilisation de la base de données Contacts.

  Pour reproduire le contenu de cette base de données sur votre poste, créez-la via le client
  PostgreSQL de votre choix, puis exécutez le script disponible dans `SQL/Contacts.sql`.
*/

include_once('config.php');

$bdd = new PDO("pgsql:host=$bdd_hote;port=$bdd_port;dbname=$bdd_nomBD", $bdd_nomUtilisateur, $bdd_motDePasse);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      Liste de contacts
    </title>
  </head>
  <body>

  </body>
</html>
