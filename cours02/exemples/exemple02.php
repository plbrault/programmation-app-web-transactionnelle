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
    $nombre = $_GET['nombre'];

    if (isset($nombre)) {
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
