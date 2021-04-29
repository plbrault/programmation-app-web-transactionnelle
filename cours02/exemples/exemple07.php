<?php
  $noExemple = 7;
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

        if ($nombre % 3 === 0 && $nombre % 5 === 0) {
          echo "$nombre est divisible par 3 et 5.";
        } else if ($nombre % 3 === 0) {
          echo "$nombre est divisible par 3.";
        } else if ($nombre % 5 === 0) {
          echo "$nombre est divisible par 5.";
        } else {
          echo "$nombre n'est divisible ni par 3, ni par 5.";
        }
      } else {
        echo 'Paramètre <strong>nombre</strong> manquant.';
      }
    ?>
  </body>
</html>
