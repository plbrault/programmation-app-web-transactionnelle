<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 01 (D)
    </title>
  </head>
  <body>
    <?php
      $a = 2;
      $b = 4;
      $c = 8;
      $d = 16;
      $e = 32;
      $f = 64;
      $g = 128;

      echo '$a = ' . $a
        . '<br />$b = ' . $b
        . '<br />$c = ' . $c
        . '<br />$d = ' . $d
        . '<br />$e = ' . $e
        . '<br />$f = ' . $f
        . '<br />$g = ' . $g
        . '<hr />';

      $a += 2;
      $b -= 3;
      $c += $a;
      $d *= 3;
      $e /= $b;
      $f++;
      $g--;

      echo '$a = ' . $a
      . '<br />$b = ' . $b
      . '<br />$c = ' . $c
      . '<br />$d = ' . $d
      . '<br />$e = ' . $e
      . '<br />$f = ' . $f
      . '<br />$g = ' . $g;   
    ?>
  </body>
</html>
