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
    <link rel="stylesheet" href="/cours10/exemple/style.css"> 
  </head>
  <body>
    <h1>Liste de contacts</h1>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

          $reponse = $bdd->query('SELECT id, nom, prenom FROM contacts ORDER BY nom, prenom');

          while ($contact = $reponse->fetch()) {
            ?>
              <tr class="ligne-donnees" onClick="window.location.href='afficher.php?id=<?= $contact['id'] ?>'">
                <td>
                  <?= $contact['nom'] ?>
                </td>
                <td>
                  <?= $contact['prenom'] ?>
                </td>
                <td>
                  <a href="modifier.php?id=<?= $contact['id'] ?>">Modifier</a>
                  &nbsp;
                  <a href="supprimer.php?id=<?= $contact['id'] ?>">Supprimer</a>
                </td>
              </tr>
            <?php
          }

        ?>
      </tbody>
    </table>
  </body>
</html>
