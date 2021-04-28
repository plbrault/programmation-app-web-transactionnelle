<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 01 (H)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      $nombre1 = $_GET['nombre1'];
      $nombre2 = $_GET['nombre2'];

      $somme = $nombre1 + $nombre2;
      
      echo $somme;
      echo '<a href="lab01h.php?nombre1=' . $nombre2 . '&nombre2=' . $somme . '">&gt;</a>';
    ?>
  </body>
</html>
