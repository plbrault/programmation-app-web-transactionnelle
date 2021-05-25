<!DOCTYPE html>
<html>
  <head>
    <title>
      Exercice 5
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      for ($i = 1; $i <= 50; $i++) {
        echo '* ';
        if ($i % 5 === 0) {
          echo '<br />';
        }
        if ($i % 10 === 0) {
          echo '<br />';
        }
      }
    ?>
  </body>
</html>
