<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 05 (A)</title>
  </head>
  <body>
    <?php
      if (!isset($_GET['nombre'])) {
        echo 'Le paramètre <strong>nombre</strong> est manquant.';
        exit;
      }

      $nombre = $_GET['nombre'];

      switch ($nombre) {
        case 1:
          echo 'un';
          break;
        case 2:
          echo 'deux';
          break;
        case 3:
          echo 'trois';
          break;
        case 4:
          echo 'quatre';
          break;
        case 5:
          echo 'cinq';
          break;
        case 6:
          echo 'six';
          break;
        case 7:
          echo 'sept';
          break;
        case 8:
          echo 'huit';
          break;
        case 9:
          echo 'neuf';
          break;
        case 10:
          echo 'dix';
          break;
        default:
          echo 'Le nombre doit être entre 1 et 9.';
      }
    ?>
  </body>
</html>
