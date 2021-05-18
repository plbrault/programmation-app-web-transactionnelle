<!DOCTYPE html>
<html>
  <head>
    <title>Bonjour</title>
  </head>
  <body>
    <?php
      if (!isset($_POST['prenom'])) {
        echo 'Prénom manquant.';
        exit;
      }
      if (!isset($_POST['nom'])) {
        echo 'Nom manquant.';
        exit;
      }

      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];

      echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
    ?>
    <a href="index.html">&lt; Retour</a>
  </body>
</html>