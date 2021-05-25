<!DOCTYPE html>
<html>
  <head>
    <title>Exercice 2</title>
  </head>
  <body>
    <?php
      $tableau1 = [9, 27, 15, 76];
      $tableau2 = [42, 19, 31];

      foreach ($tableau2 as $valeur) {
        array_push($tableau1, $valeur);
      }

      foreach ($tableau1 as $valeur) {
        echo "$valeur ";
      }
    ?>
  </body>
</html>
