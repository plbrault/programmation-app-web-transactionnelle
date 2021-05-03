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

      $secondes++;

      if ($secondes == 60) {
        $minutes++;
        $secondes = 0;
      }
      if ($minutes == 60) {
        $heures++;
        $minutes = 0;
      }
      if ($heures == 24) {
        $heures = 0;
      }

      if ($heures < 10) {
        echo 0;
      }
      echo "$heures:";
      if ($minutes < 10) {
        echo 0;
      }
      echo "$minutes:";
      if ($secondes < 10) {
        echo 0;
      }
      echo "$secondes";
    ?>
  </body>
</html>
