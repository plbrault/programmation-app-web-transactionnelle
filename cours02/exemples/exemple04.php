<?php
  $noExemple = 4;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php
        // Ajoute un 0 au début du numéro de l'exemple s'il est inférieur à 10
        echo 'Exemple ';
        if ($noExemple < 10) {
          echo 0;
        }
        echo $noExemple;
      ?>
    </title>
  </head>
  <body>
    <?php
      if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        if ($nombre < 0) {
          echo "$nombre est négatif.";
        } else if ($nombre == 0) {
          echo "$nombre est nul.";
        } else if ($nombre < 10) {
          echo "$nombre est entre 1 et 9.";
        } else if ($nombre <= 99) {
          echo "$nombre est entre 10 et 99.";
        } else {
          echo "$nombre est supérieur ou égal à 100.";
        }
      } else {
        echo 'Paramètre <strong>nombre</strong> manquant.';
      }
    ?>
  </body>
</html>
