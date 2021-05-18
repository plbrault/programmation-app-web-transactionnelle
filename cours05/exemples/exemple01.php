<?php
  $noExemple = 1;
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
    <table>
      <?php
        if (!isset($_GET['nombre'])) {
          echo 'Paramètre <strong>nombre</strong> manquant.';
          exit;
        }

        $nombre = $_GET['nombre'];

        $parite = $nombre % 2 === 0 ? 'pair' : 'impair';

        echo "Le nombre $nombre est <strong>$parite</strong>.";
      ?>
    </table>
  </body>
</html>
