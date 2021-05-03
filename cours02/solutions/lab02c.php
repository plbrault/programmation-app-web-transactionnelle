<!DOCTYPE html>
<html>
  <head>
    <title>
      Laboratoire 02 (C)
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (isset($_GET['age']) && isset($_GET['genre'])) {
        $age = $_GET['age'];
        $genre = $_GET['genre'];

        if ($genre !== 'M' && $genre !== 'm' && $genre !== 'F' && $genre !== 'f' && $genre !== 'X' && $genre !== 'x') {
          echo "Erreur: Le genre doit être M, F ou X.";
        } else if ($age < 0) {
          echo "Erreur: L'âge doit être supérieur à 0.";
        } else if ($age > 120) {
          if ($genre === 'M' || $genre === 'm') {
            echo 'Vous êtes trop vieux.';
          } else if ($genre === 'F' || $genre === 'f') {
            echo 'Vous êtes trop vieille.';
          } else {
            echo 'Vous êtes trop vieux.eille.';
          }
        } else if ($age < 50) {
          echo 'Vous êtes jeune.';
        } else {
          if ($genre === 'M' || $genre === 'm') {
            echo 'Vous êtes vieux.';
          } else if ($genre === 'F' || $genre === 'f') {
            echo 'Vous êtes vieille.';
          } else {
            echo 'Vous êtes vieux.eille.';
          }
        } 
      } else if (!isset($_GET['age'])) {
        echo 'Paramètre "<strong>age</strong>" manquant.';
      } else {
        echo 'Paramètre "<strong>genre</strong>" manquant.';
      }
    ?>
  </body>
</html>
