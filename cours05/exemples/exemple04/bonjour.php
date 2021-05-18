<!DOCTYPE html>
<html>
  <head>
    <title>Bonjour</title>
  </head>
  <body>
    <?php
      if (!isset($_GET['prenom'])) {
        echo 'Paramètre <strong>prenom</strong> manquant.';
        exit;
      }
      if (!isset($_GET['nom'])) {
        echo 'Paramètre <strong>nom</strong> manquant.';
        exit;
      }

      $prenom = $_GET['prenom'];
      $nom = $_GET['nom'];

      echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
    ?>
    <a href="index.html">&lt; Retour</a>
  </body>
</html>