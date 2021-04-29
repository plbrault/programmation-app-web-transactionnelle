<?php
  $noExemple = 2;
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

      $estNegatif = $nombre < 0;
      $estNul = $nombre == 0;
      $estPositif = $nombre > 0;
      
      if ($estNegatif) {
        echo "$nombre est négatif.";
      } else if ($estNul) {
        echo "$nombre est nul.";
      } else if ($estPositif == true) { // Le « == true » est superflu, mais donne le même résultat
        echo "$nombre est positif.";
      }
    } else {
      echo 'Paramètre <strong>nombre</strong> manquant.';
    } 
  ?>
  </body>
</html>
