<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 01 (C)
    </title>
  </head>
  <body>
    <?php
      $a = 16;
      $b = 24;

      echo '$a = ' . $a
        . '<br />$b = ' . $b;

      $c = $a;
      $a = $b;
      $b = $c;

      echo '<br />$a = ' . $a
      . '<br />$b = ' . $b;
    ?>
  </body>
</html>
