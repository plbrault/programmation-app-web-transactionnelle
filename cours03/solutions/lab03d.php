<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 03 (D)</title>
  </head>
  <body>
    <?php
      if (!isset($_GET['nombre'])) {
        echo 'Paramètre <strong>nombre</strong> manquant.';
        exit;
      }

      $nombre = $_GET['nombre'];

      if ($nombre < 1) {
        echo 'Le paramètre <strong>nombre</strong> doit être supérieur ou égal à 1.';
        exit;
      }
      if ($nombre > 50000) {
        echo 'Le paramètre <strong>nombre</strong> doit être inférieur à 50 000.';
        exit;
      }

      $nombreDepart = $nombre;
      $compteur = 0;
      while ($nombre <= 100000) {
        $nombre *= 2;
        $compteur++;
      }

      echo "Le nombre $nombreDepart peut être doublé à $compteur reprises avant de dépasser 100 000.";
    ?>
  </body>
</html>
