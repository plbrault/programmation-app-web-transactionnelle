<?php
  $noExemple = 3;
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo "Exemple $noExemple" ?></title>
  </head>
  <body>
  <?php
    if (isset($_GET['nombre'])) {
      $nombre = $_GET['nombre'];
      $signe = null; // Déclare une variable sans l'initialiser

      if ($nombre < 0) {
        $signe = 'négatif';
      } else if ($nombre == 0) {
        $signe = 'nul';
      } else {
        $signe = 'positif';
      }

      echo "$nombre est $signe.";
    } else {
      echo 'Paramètre <strong>nombre</strong> manquant.';
    }
  ?>
  </body>
</html>
