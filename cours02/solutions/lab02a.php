<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (A)
    </title>
  </head>
  <body>
    <?php
      if (isset($_GET['age'])) {
        $age = $_GET['age'];

        if ($age < 50) {
          echo 'Vous êtes jeune.';
        } else {
          echo 'Vous êtes vieux ou vieille.';
        }
      } else {
        echo 'Paramètre "<strong>age</strong>" manquant.';
      }
    ?>
  </body>
</html>
