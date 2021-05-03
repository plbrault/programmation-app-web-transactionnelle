<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (G)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (!isset($_GET['nombre1'])) {
        echo 'Paramètre manquant: "<strong>nombre1</strong>".';
      } else if (!isset($_GET['nombre2'])) {
        echo 'Paramètre manquant: "<strong>nombre2</strong>".';
      } else if (!isset($_GET['nombre3'])) {
        echo 'Paramètre manquant: "<strong>nombre3</strong>".';
      } else {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        $nombre3 = $_GET['nombre3'];

        if ($nombre1 <= $nombre2 && $nombre2 <= $nombre3) {
          echo "$nombre1 $nombre2 $nombre3";
        } else if ($nombre1 <= $nombre3 && $nombre3 <= $nombre2) {
          echo "$nombre1 $nombre3 $nombre2";
        } else if ($nombre2 <= $nombre1 && $nombre1 <= $nombre3) {
          echo "$nombre2 $nombre1 $nombre3";
        } else if ($nombre2 <= $nombre3 && $nombre3 <= $nombre1) {
          echo "$nombre2 $nombre3 $nombre1";
        } else if ($nombre3 <= $nombre1 && $nombre1 <= $nombre2) {
          echo "$nombre3 $nombre1 $nombre2";
        } else if ($nombre3 <= $nombre2 && $nombre2 <= $nombre1) {
          echo "$nombre3 $nombre2 $nombre1";
        }
      }
    ?>
  </body>
</html>
