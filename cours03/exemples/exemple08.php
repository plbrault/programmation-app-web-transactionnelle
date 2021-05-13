<?php
  $noExemple = 8;

  // Ce script dessine un tableau d'échecs
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
    <link rel="stylesheet" type="text/css" href="exemple08.css" />
  </head>
  <body>
    <table>
      <?php
        for ($i = 0; $i < 8; $i++) {
          echo '<tr>';
          for ($j = 0; $j < 8; $j++) {
            echo '<td class="';
            // Si la parité (pair ou impair) de la ligne est égale à celle de la colonne, la case doit être blanche. Sinon, elle doit être noire.
            if ($i % 2 === $j % 2) {
              echo 'blanc';
            } else {
              echo 'noir';
            }
            echo '"></td>';
          }
          echo '</tr>';
        }
      ?>
    </table>
  </body>
</html>
