<?php
  $noExemple = 7;

/*

Ce script utilise des boucles for imbriquées pour afficher le motif suivant:

* * * * * * * * * *
* * * * * * * * *
* * * * * * * *
* * * * * * *
* * * * * *
* * * * *
* * * *
* * *
* *
*

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
        for ($ligne = 10; $ligne >= 1; $ligne--) {
          for ($colonne = 1; $colonne <= $ligne; $colonne++) {
            echo '* ';
          }
          echo '<br />';
        }    
    ?>
  </body>
</html>
