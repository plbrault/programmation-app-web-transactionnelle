<?php
  $noExemple = 8;
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
      $nombres = array();

      // Remplit le tableau avec 20 fois le nombre 0
      for ($i = 1; $i <= 20; $i++) {
        array_push($nombres, 0);
      }

      // Affiche le contenu du tableau
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }

      echo '<hr />';

      // Remplace les 20 valeurs du tableau par les nombres de 1 à 20
      for ($i = 0; $i < 20; $i++) {
        $nombres[$i] = $i + 1;
      }

      // Affiche le contenu du tableau de nouveau
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }
    ?>
  </body>
</html>
