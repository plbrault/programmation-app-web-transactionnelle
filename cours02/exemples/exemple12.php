<?php
  $noExemple = 12;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php
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
      if (!isset($_GET['mot1'])) {
        echo 'Paramètre <strong>mot1</strong> manquant.';
      } else if (!isset($_GET['mot2'])) {
        echo 'Paramètre <strong>mot2</strong> manquant.';
      } else if (!isset($_GET['mot3'])) {
        echo 'Paramètre <strong>mot3</strong> manquant.';
      } else {
        $mot1 = $_GET['mot1'];
        $mot2 = $_GET['mot2'];
        $mot3 = $_GET['mot3'];

        if ($mot1 <= $mot2 && $mot2 <= $mot3) {
          echo 'Les trois mots sont placés en ordre alphabétique.';
        } else {
          echo 'Les trois mots ne sont pas placés en ordre alphabétique.';
        }
      }
    ?>
  </body>
</html>
