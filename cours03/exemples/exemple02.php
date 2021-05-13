<?php
  $noExemple = 2;
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
      // Affiche les nombres de 1 à 20 à l'aide d'une boucle for
      for ($i = 1; $i <= 20; $i++) {
        echo "$i <br />";
      }
    ?>
  </body>
</html>
