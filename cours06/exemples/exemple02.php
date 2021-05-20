<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 02</title>
  </head>
  <body>
    <table>
      <?php
        $tableau = [5, 3, 2, 4, 1];

        foreach ($tableau as $element) {
          echo $element . '<br />';
        }

        echo '<hr />';

        asort($tableau);

        foreach ($tableau as $element) {
          echo $element . '<br />';
        }
      ?>
    </table>
  </body>
</html>
