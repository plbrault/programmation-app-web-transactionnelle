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
      // Crée un tableau de chaînes de caractères
      $familleSimpson = ['Homer', 'Marge', 'Bart', 'Lisa', 'Maggie'];

      // Affiche le nombre d'éléments contenus dans le tableau
      echo 'La famille Simpson comprend ' . count($familleSimpson) .  ' personnes: <br />';

      // Affiche les valeurs du tableau à l'aide d'une boucle For-Each
      echo '<ul>';
      foreach ($familleSimpson as $membreFamilleSimpson) {
        echo "<li>$membreFamilleSimpson</li>";
      }
      echo '</ul>';
    ?>
  </body>
</html>
