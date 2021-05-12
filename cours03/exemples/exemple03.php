<?php
  $noExemple = 1;
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
    <?php
      // Reçoit une variable "max" par l'URL
      if (!isset($_GET['max'])) {
        echo 'Paramètre <strong>max</strong> manquant.';
        exit; // Arrête l'exécution du script ici. Pratique pour les validations de paramètres.
      }

      $max = $_GET['max'];

      // Affiche les nombres de 1 à $max à l'aide d'une boucle while
      $nombre = 1;
      while ($nombre <= $max) {
        echo "$nombre <br />";
        $nombre++;
      }
    ?>
  </body>
</html>
