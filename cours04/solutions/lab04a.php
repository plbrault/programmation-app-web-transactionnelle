<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (A)</title>
  </head>
  <body>
    <?php
      $nombres = array();

      for ($i = 1; $i <= 99; $i += 2) {
        array_push($nombres, $i);
      }

      for ($i = 0; $i < count($nombres); $i++) {
        echo "$nombres[$i] <br />";
      }

      echo '<hr />';

      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }
    ?>
  </body>
</html>
