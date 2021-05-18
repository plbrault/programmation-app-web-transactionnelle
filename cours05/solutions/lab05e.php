<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 05 (E)</title>
  </head>
  <body>
    <?php
      $afficherFormulaire = true;
      
      if (isset($_POST['motDePasse'])) {
        $motDePasse = $_POST['motDePasse'];
        if ($motDePasse === 'abricot') {
          echo 'Bravo! Vous avez trouvé le mot de passe!';
          $afficherFormulaire = false;
        } else {
          echo 'Mauvais mot de passe.';
        }
      }

      if ($afficherFormulaire) {
        ?>

        <form action="lab05e.php" method="POST">
          <label for="mdp-input">Mot de passe:</label>
          <input type="password" id="mdp-input" name="motDePasse" required />

          <input type="Submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>