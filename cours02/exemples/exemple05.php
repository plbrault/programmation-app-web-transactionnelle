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
      if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        if ($nombre % 2 === 0) {
          echo "$nombre est pair.";
        } else {
          echo "$nombre est impair.";
        }
      } else {
        echo 'Paramètre <strong>nombre</strong> manquant.';
      }
    ?>
  </body>
</html>
