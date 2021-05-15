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
      // Crée un tableau de chaînes de caractères
      $familleSimpson = ['Homer', 'Marge', 'Bart', 'Lisa', 'Maggie'];

      echo 'La famille Simpson comprend ' . count($familleSimpson) .  ' personnes: <br />';
      echo '<ul>';

      // À l'aide d'une boucle For-Each, ajoute " Simpson" ou " Bouvier" à chaque élément du tableau avant de l'afficher
      foreach ($familleSimpson as &$membreFamilleSimpson) {
        if ($membreFamilleSimpson === 'Marge') {
          $membreFamilleSimpson .= " Bouvier";
        } else {
          $membreFamilleSimpson .= " Simpson";
        }

        echo "<li>$membreFamilleSimpson</li>";
      }

      echo '</ul>';

      unset($membreFamilleSimpson);
    ?>
  </body>
</html>
