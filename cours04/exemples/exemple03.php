<?php
  $noExemple = 3;
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

      // Ajoute " Simpson" à chaque élément du tableau à l'aide d'une boucle For
      for ($i = 0; $i < count($familleSimpson); $i++) {
        $familleSimpson[$i] .= " Simpson";
      }

      echo 'La famille Simpson comprend ' . count($familleSimpson) .  ' personnes: <br />';
      echo '<ul>';
      foreach ($familleSimpson as $membreFamilleSimpson) {
        echo "<li>$membreFamilleSimpson</li>";
      }
      echo '</ul>';
    ?>
  </body>
</html>
