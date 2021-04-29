<?php
  $noExemple = 1;
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo "Exemple $noExemple" ?></title>
  </head>
  <body>
  <?php
    if (isset($_GET['nombre'])) { // Permet de vérifier si une variable existe
      $nombre = $_GET['nombre'];

      if ($nombre < 0) {
        echo "$nombre est négatif.";
      } else if ($nombre == 0) { // On ne peut pas utiliser === car les variables reçues par l'URL sont toujours de type string
        echo "$nombre est nul.";
      } else {
        echo "$nombre est positif.";
      }
    } else {
      echo 'Paramètre <strong>nombre</strong> manquant.';
    }
  ?>
  </body>
</html>
