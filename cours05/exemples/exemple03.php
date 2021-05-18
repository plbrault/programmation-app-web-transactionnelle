<?php
  $noExemple = 3;
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
      $nombreJoursParMois = array(
        'janvier' => 31,
        'février' => 28,
        'mars' => 31,
        'avril' => 30,
        'mai' => 31,
        'juin' => 30,
        'juillet' => 31,
        'août' => 31,
        'septembre' => 30,
        'octobre' => 31,
        'novembre' => 30,
        'décembre' => 31,
      );

      if (!isset($_GET['mois'])) {
        echo 'Paramètre <strong>mois</strong> manquant.';
        exit;
      }

      $mois = $_GET['mois'];

      if (isset($nombreJoursParMois[$mois])) {
        echo "Le mois de $mois compte $nombreJoursParMois[$mois] jours."; 
      } else {
        echo 'Mois invalide.';
      }
    ?>
  </body>
</html>