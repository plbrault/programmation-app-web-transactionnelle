<!DOCTYPE html>
<html>
  <head>
    <title>Exercice 1</title>
  </head>
  <body>
    <?php
      $tableau = [15, 10, 17, 15, 11, 13, 12];

      $somme = 0;
      foreach ($tableau as $valeur) {
        $somme += $valeur;
      }
      $moyenne = $somme / count($tableau);

      echo $moyenne;
    ?>
  </body>
</html>
