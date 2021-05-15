<?php
  $noExemple = 11;
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

      // Remplit le tableau avec 10 fois le nombre 0
      for ($i = 0; $i < 10; $i++) {
        array_push($nombres, 0);
      }

      // Affiche le contenu du tableau
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }

      echo '<hr />';

      // Remplace les 10 valeurs du tableau par les nombres *pairs* de 0 à 18
      for ($i = 0; $i < 10; $i++) {
        $nombres[$i] = $i * 2;
      }

      // Affiche le contenu du tableau de nouveau
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }
    ?>
  </body>
</html>
