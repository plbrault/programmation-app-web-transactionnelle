<?php
  $noExemple = 7;

/*

Ce script utilise une boucle for pour afficher les 20 premiers nombres de la suite de Fibonacci
(0, 1, 1, 2, 3, 5, 8, 13, 21, ...)

*/

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
        $nombre1 = 0;
        $nombre2 = 1;
        for ($i = 0; $i < 20; $i++) {
          $somme = $nombre1 + $nombre2;
          echo "$somme<br />";
          $nombre1 = $nombre2;
          $nombre2 = $somme;
        }
    ?>
  </body>
</html>
