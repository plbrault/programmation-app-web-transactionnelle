<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (D)
    </title>
  </head>
  <body>
    <?php
      if (isset($_GET['ageEnfant'])) {
        $ageEnfant = $_GET['ageEnfant'];

        if ($ageEnfant > 13) {
          echo 'Junior';
        } else if ($ageEnfant > 11) {
          echo 'Juvénie';
        } else if ($ageEnfant > 9) {
          echo 'Cadet';
        } else if ($ageEnfant > 7) {
          echo 'Benjamin';
        } else {
          echo 'Minime';
        }
      } else {
        echo 'Erreur: Paramètre "<strong>ageEnfant</strong>" manquant.';
      }
    ?>
  </body>
</html>
