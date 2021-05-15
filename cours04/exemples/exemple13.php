<?php
  $noExemple = 13;

  // Ce script crée une matrice contenant les couleurs des cases d'un échiquier
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
    <link rel="stylesheet" type="text/css" href="exemple13.css" />
  </head>
  <body>
    <table>
      <?php
        $echiquier = array();
        
        // Génère la matrice
        for ($i = 0; $i < 8; $i++) {
          $ligne = array();
          for ($j = 0; $j < 8; $j++) {
            // Si la parité (pair ou impair) de la ligne est égale à celle de la colonne, la case doit être blanche. Sinon, elle doit être noire.
            if ($i % 2 === $j % 2) {
              array_push($ligne, 'blanc');
            } else {
              array_push($ligne, 'noir');
            }
          }
          array_push($echiquier, $ligne);
        }

        // Affiche l'échiquier à partir de la matrice
        echo '<table>';
        foreach ($echiquier as $ligne) {
          echo '<tr>';
          foreach ($ligne as $case) {
            echo "<td class=\"$case\"></td>";
          }
          echo '</tr>';
        }
        echo '</table>';
      ?>
    </table>
  </body>
</html>
