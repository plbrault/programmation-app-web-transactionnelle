<?php
  $noExemple = 5;
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
      // Affiche les nombres *pairs* de 0 à 20 à l'aide d'une boucle for
      for ($i = 0; $i <= 20; $i += 2) {
        echo "$i <br />";
      }
    ?>
  </body>
</html>
