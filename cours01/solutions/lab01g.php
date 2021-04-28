<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 01 (G)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      echo '<a href="lab01g.php?nombre=' . $_GET['nombre'] - 1 . '">&lt;</a>';
      echo $_GET['nombre'];
      echo '<a href="lab01g.php?nombre=' . $_GET['nombre'] + 1 . '">&gt;</a>';
    ?>
  </body>
</html>
