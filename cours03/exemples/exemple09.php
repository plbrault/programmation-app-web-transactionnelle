<?php
  $noExemple = 9;

  // Ce script permet de savoir combien de fois un nombre peut être divisé par 2 avant d'obtenir un résultat inférieur ou égal à 1.
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php
        echo 'Exemple ';
        if ($noExemple < 10) {
          echo 0;
        }
        echo $noExemple;
      ?>
    </title>
  </head>
  <body>
    <table>
      <?php
        if (!isset($_GET['nombre'])) {
          echo 'Paramètre <strong>nombre</strong> manquant.';
          exit; // Arrête l'exécution du script ici. Pratique pour les validations de paramètres.
        }

        $nombreDepart = $_GET['nombre'];
        $nombre = $nombreDepart;

        $compteur = 0;
        while ($nombre > 1) {
          $nombre /= 2;
          $compteur++;
        }

        echo "$nombreDepart peut être divisé par deux $compteur fois avant d'obtenir un résultat inférieur ou égal à 1.";
      ?>
    </table>
  </body>
</html>
