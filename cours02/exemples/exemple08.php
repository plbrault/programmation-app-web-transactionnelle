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
      if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        if ($nombre % 3 === 0 && $nombre % 5 === 0 && $nombre % 2 === 0 && $nombre % 7 === 0) {
          echo "$nombre est divisible par 3, 5, 2 et 7.";
        } else if (($nombre % 3 === 0 && $nombre % 5 === 0) || ($nombre % 2 === 0 && $nombre % 7 === 0)) {
          echo "$nombre est divisible par 3 et 5 ou par 2 et 7.";
        } else {
          echo "$nombre n'est divisible ni à la fois par 3 et 5, ni à la fois par 2 et 7.";
        }
      } else {
        echo 'Paramètre <strong>nombre</strong> manquant.';
      }
    ?>
  </body>
</html>
