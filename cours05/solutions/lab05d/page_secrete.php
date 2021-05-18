<!DOCTYPE html>
<html>
  <head>
    <title>Page secrète</title>
  </head>
  <body>
    <?php
      if (!$_POST['motDePasse']) {
        echo 'Cette page est secrète.';
        exit;
      }

      if ($_POST['motDePasse'] === 'abricot') {
        echo 'Bravo! Vous avez trouvé le mot de passe!';
      } else {
        ?>

        <p>Mauvais mot de passe!</p>
        <a href="formulaire.html">&lt; Retour</a>

        <?php
      }
    ?>
  </body>
</html>
