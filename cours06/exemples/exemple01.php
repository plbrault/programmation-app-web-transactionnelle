<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 01
    </title>
  </head>
  <body>
    <?php
      /*
        Reprise de la solution du Laboratoire 02 (C) où on validait un genre et un âge reçus en paramètres dans l'URL.
        Cette fois-ci, on utilise strtolower pour simplifier la validation du genre.
      */

      if (isset($_GET['age']) && isset($_GET['genre'])) {
        $age = $_GET['age'];
        $genre = strtolower($_GET['genre']); // $genre est maintenant toujours en minuscule

        // Ancienne condition: if ($genre !== 'M' && $genre !== 'm' && $genre !== 'F' && $genre !== 'f' && $genre !== 'X' && $genre !== 'x') {
        if ($genre !== 'm' && $genre !== 'f' && $genre !== 'x') {
          echo "Erreur: Le genre doit être M, F ou X.";
        } else if ($age <= 0) {
          echo "Erreur: L'âge doit être supérieur à 0.";
        } else if ($age > 120) {
          // Ancienne condition: if ($genre === 'M' || $genre === 'm') {
          if ($genre === 'm') {
            echo 'Vous êtes trop vieux.';
          // Ancienne condition: else if ($genre === 'F' || $genre === 'f') {
          } else if ($genre === 'f') {
            echo 'Vous êtes trop vieille.';
          } else {
            echo 'Vous êtes trop vieux.eille.';
          }
        } else if ($age < 50) {
          echo 'Vous êtes jeune.';
        } else {
          // Ancienne condition: if ($genre === 'M' || $genre === 'm') {
          if ($genre === 'm') {
            echo 'Vous êtes vieux.';
          }
          // Ancienne condition: else if ($genre === 'F' || $genre === 'f') {
          else if ($genre === 'f') {
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
