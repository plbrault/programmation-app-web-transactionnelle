<?php
  /*
    Utilisation de la base de données Contacts.

    Pour reproduire le contenu de cette base de données sur votre poste, créez-la via le client
    PostgreSQL de votre choix, puis exécutez le script disponible dans `SQL/Contacts.sql`.
  */

  include_once('connexionBD.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      Liste de contacts
    </title>
    <link rel="stylesheet" href="/cours10/exemple-v2/style.css"> 
  </head>
  <body>
    <h1>Liste de contacts</h1>

    <main>
      <p>
        <a href="/cours10/exemple-v2/ajouter.php">Ajouter un contact</a>
      </p>

      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $reponse = $bdd->query('SELECT id, nom, prenom FROM contacts ORDER BY nom, prenom');

            foreach ($reponse as $contact) {
              ?>
                <tr class="ligne-donnees">
                  <td onClick="window.location.href='/cours10/exemple-v2/afficher.php?id=<?= $contact['id'] ?>'">
                    <?= $contact['nom'] ?>
                  </td>
                  <td onClick="window.location.href='/cours10/exemple-v2/afficher.php?id=<?= $contact['id'] ?>'">
                    <?= $contact['prenom'] ?>
                  </td>
                  <td class="col-actions">
                    <a href="/cours10/exemple-v2/modifier.php?id=<?= $contact['id'] ?>">
                      ✏️
                    </a>
                    &nbsp;
                    <a
                      onclick="return confirm('Voulez-vous vraiment supprimer le contact « <?= $contact['nom'] . ', ' . $contact['prenom'] ?> » ?')"
                      href="/cours10/exemple-v2/supprimer.php?id=<?= $contact['id'] ?>"
                    >
                      ❌
                    </a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </main>
  </body>
</html>
