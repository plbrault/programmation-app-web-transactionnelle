<?php
  $noExemple = 10;
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
      if (isset($_GET['prenom'])) {
        $prenom = $_GET['prenom'];

        if ($prenom === 'Bob') {
          echo 'Votre prénom est Bob.';
        } else {
          echo "Votre prénom n'est pas Bob.";
        }
      } else {
        echo 'Paramètre <strong>prenom</strong> manquant.';
      }
    ?>
  </body>
</html>
