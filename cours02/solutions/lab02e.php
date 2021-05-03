<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (E)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (isset($_GET['heures'])) {
        $heures = $_GET['heures'];
      } else {
        $heures = 0;
      }

      if (isset($_GET['minutes'])) {
        $minutes = $_GET['minutes'];
      } else {
        $minutes = 0;
      }

      if (isset($_GET['secondes'])) {
        $secondes = $_GET['secondes'];
      } else {
        $secondes = 0;
      }

      $secondes++;  // L'opérateur ++


    ?>
  </body>
</html>
