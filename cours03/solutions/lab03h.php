<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 03 (H)</title>
    <link rel="stylesheet" type="text/css" href="lab03h.css" />
  </head>
  <body>
    <table>
      <?php
        for ($i = 0; $i < 10; $i++) {
          echo '<tr>';
          for ($j = 0; $j < 10; $j++) {
            echo '<td>';
            echo ($i * 10) + $j;
            echo '</td>';
          }
          echo '</tr>';
        }
      ?>
    </table>
  </body>
</html>
