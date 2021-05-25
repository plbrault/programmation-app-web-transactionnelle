<!DOCTYPE html>
<html>
  <head>
    <title>
      Exercice 4
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (!isset($_GET['min'])) {
        echo 'Paramètre <strong>min</strong> manquant.';
        exit;
      }
      if (!isset($_GET['max'])) {
        echo 'Paramètre <strong>max</strong> manquant.';
        exit;
      }
      if (!isset($_GET['inc'])) {
        echo 'Paramètre <strong>inc</strong> manquant.';
        exit;
      }

      $min = $_GET['min'];
      $max = $_GET['max'];
      $inc = $_GET['inc'];

      for ($i = $min; $i <= $max; $i += $inc) {
        echo "$i <br />";
      }
    ?>
  </body>
</html>
