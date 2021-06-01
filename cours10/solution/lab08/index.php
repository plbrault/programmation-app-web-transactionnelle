<?php
  include_once('connexionBD.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      Mes séries
    </title>
    <link rel="stylesheet" href="/cours10/exemple/style.css"> 
  </head>
  <body>
    <h1>Mes séries</h1>

    <main>
      <p>
        <a href="/cours10/solution/lab08/ajouter.php">Ajouter une série</a>
      </p>

      <table>
        <thead>
          <tr>
            <th>Titre</th>
            <th>Diffuseur</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $reponse = $bdd->query('SELECT id, titre, diffuseurs.nom AS nom_diffuseur FROM series JOIN diffuseurs ON series.diffuseur = diffuseurs.code ORDER BY titre');

            while ($serie = $reponse->fetch()) {
              ?>
                <tr class="ligne-donnees" onClick="window.location.href='/cours10/exemple/afficher.php?id=<?= $serie['id'] ?>'">
                  <td>
                    <?= $serie['titre'] ?>
                  </td>
                  <td>
                    <?= $serie['nom_diffuseur'] ?>
                  </td>
                  <td class="col-actions">
                    <a href="/cours10/solution/lab08/modifier.php?id=<?= $serie['id'] ?>">
                      ✏️
                    </a>
                    &nbsp;
                    <a
                      onclick="return confirm('Voulez-vous vraiment supprimer la série « <?= $serie['titre'] ?> » ?')"
                      href="/cours10/solution/lab08/supprimer.php?id=<?= $serie['id'] ?>"
                    >
                      ❌
                    </a>
                  </td>
                </tr>
              <?php
            }

            $reponse->closeCursor();

          ?>
        </tbody>
      </table>
    </main>
  </body>
</html>
