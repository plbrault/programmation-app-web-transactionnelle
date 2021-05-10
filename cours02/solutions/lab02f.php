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
      } else if (!isset($_GET['operateur'])) {
        echo 'Paramètre manquant: "<strong>operateur</strong>".';
      } else {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        $operateur = $_GET['operateur'];

        if ($operateur === '+') {
          echo $nombre1 + $nombre2;
        } else if ($operateur === '-') {
          echo $nombre1 - $nombre2;
        } else if ($operateur === '*') {
          echo $nombre1 * $nombre2;
        } else if ($operateur === '/') {
          if ($nombre2 != 0) {
            echo $nombre1 / $nombre2;
          } else {
            echo 'La division par 0 est interdite.';
          }
        } else if ($operateur === '%') {
          if ($nombre2 != 0) {
            echo $nombre1 % $nombre2;
          } else {
            echo 'Le modulo 0 est interdit.';
          }
        } else {
          echo "L'opérateur fourni est invalide. Les opérateurs possibles sont: +, -, *, / et %.";
        }
      }
    ?>
  </body>
</html>