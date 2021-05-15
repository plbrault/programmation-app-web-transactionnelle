<?php
  $noExemple = 6;
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
      $aliments = array();

      array_push($aliments, 'Des pommes');                // Ajoute l'élément « Des pommes » à $aliments
      array_push($aliments, 'Des poires', 'Des ananas');  // Ajoute les éléments « Des poires » et « Des ananas » à $aliments
      
      // Ajoute trois fois l'élément « Des biscuits » à $aliments
      for ($i = 0; $i < 3; $i++) {
        array_push($aliments, 'Des biscuits');
      }

      $aliments[count($aliments) - 1] .= ' sodas'; // Concatène « sodas » au dernier élément d'$aliments

      // Affiche les éléments du tableau
      echo '<ul>';
      foreach ($aliments as $aliment) {
        echo "<li>$aliment</li>";
      }
      echo '</ul>';
    ?>
  </body>
</html>
