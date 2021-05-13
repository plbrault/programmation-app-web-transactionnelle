<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 03 (C)</title>
  </head>
  <body>
    <?php
      if (!isset($_GET['max'])) {
        echo 'Paramètre <strong>max</strong> manquant.';
        exit;
      }

      $max = $_GET['max'];

      if ($max < 1) {
        echo 'Le paramètre <strong>max</strong> doit être supérieur ou égal à 1.';
        exit;
      }

      for ($i = 0; $i <= $max; $i += 2) {
        echo "$i <br />";
      }
    ?>
  </body>
</html>
