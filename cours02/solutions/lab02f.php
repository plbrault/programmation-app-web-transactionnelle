<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (F)
    </title>
    <link rel="stylesheet" type="text/css" href="lab02f.css" />
  </head>
  <body>
    <?php
      if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        echo '<p class="';
        if ($nombre %2 === 0) {
          echo 'pair';
        } else {
          echo 'impair';
        }
        echo '">' . $nombre . '</p>';
      } else {
        echo 'Paramètre manquant: "<strong>nombre</strong>".';
      }
    ?>
  </body>
</html>
