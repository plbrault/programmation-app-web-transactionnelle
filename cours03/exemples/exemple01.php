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
      // Affiche les nombres de 1 à 20 à l'aide d'une boucle while
      $nombre = 1;
      while ($nombre <= 20) {
        echo "$nombre <br />";
        $nombre++;
      }
    ?>
  </body>
</html>
