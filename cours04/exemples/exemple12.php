<?php
  $noExemple = 12;

/*

Ce script génère un tableau à deux dimensions contenant le motif suivant:

*
* *
* * *
* * * *
* * * * *
* * * * * *
* * * * * * *
* * * * * * * *
* * * * * * * * *
* * * * * * * * * *

*/

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
        $dessin = [];

        // Génère le tableau à deux dimensions
        for ($i = 1; $i <= 10; $i++) {
          $ligne = [];
          for ($j = 1; $j <= $i; $j++) {
            array_push($ligne, '* ');
          }
          array_push($dessin, $ligne);
        }

        // Affiche le tableau à deux dimensions
        foreach ($dessin as $ligne) {
          foreach ($ligne as $case) {
            echo $case;
          }
          echo '<br />';
        }
    ?>
  </body>
</html>
