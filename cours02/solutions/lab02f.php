<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (F)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (!isset($_GET['nombre1'])) {
        echo 'Paramètre manquant: "<strong>nombre1</strong>".';
      } else if (!isset($_GET['nombre2'])) {
        echo 'Paramètre manquant: "<strong>nombre2</strong>".';
      } else {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];

        if ($nombre1 <= $nombre2) {
          echo "$nombre1 $nombre2";
        } else {
          echo "$nombre2 $nombre1";
        }
      }
    ?>
  </body>
</html>
