<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (B)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (isset($_GET['age']) && isset($_GET['genre'])) {
        $age = $_GET['age'];
        $genre = $_GET['genre'];

        if ($age < 50) {
          echo 'Vous êtes jeune.';
        } else if ($genre === 'M' || $genre === 'm') {
          echo 'Vous êtes vieux.';
        } else if ($genre === 'F' || $genre === 'f') {
          echo 'Vous êtes vieille.';
        } else if ($genre === 'X' || $genre === 'x') {
          echo 'Vous êtes vieux.eille.';
        }
      } else if (!isset($_GET['age'])) {
        echo 'Paramètre "<strong>age</strong>" manquant.';
      } else {
        echo 'Paramètre "<strong>genre</strong>" manquant.';
      }
    ?>
  </body>
</html>
