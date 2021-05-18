<?php
  $motsDePasseUtilisateurs = array(
    'bob' => 'bobEstCool',
    'alice' => 'aliceEstCool',
    'roger' => 'rogerEstCool'
  );
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 09</title>
  </head>
  <body>
    <?php
      /*
        Logique du script:

        Si le formulaire n'a pas été envoyé:
          - Afficher le formulaire
        
        Si le formulaire a été envoyé:
          - Vérifier le nom d'utilisateur et le mot de passe
          - S'ils sont valide, afficher « Bonjour (nom d'utilisateur) ! »
          - Sinon, réafficher le formulaire avec un message d'erreur
      */

      $formulaireEnvoye = isset($_POST['utilisateur']) && isset($_POST['motDePasse']);

      if ($formulaireEnvoye) {
        $utilisateur = $_POST['utilisateur'];
        $motDePasse = $_POST['motDePasse'];

        $motDePasseInvalide = $motsDePasseUtilisateurs[$utilisateur] !== $motDePasse;

        if (!$motDePasseInvalide) {
          echo "<p>Bonjour <strong>$utilisateur</strong> !</p>";
        }
      }

      if (!$formulaireEnvoye || $motDePasseInvalide) {
        if ($motDePasseInvalide) {
          echo "<p>Nom d'utilisateur ou mot de passe invalide.</p>";
        }

        ?>

        <form action="exemple09.php" method="POST">
          <label for="utilisateur-input">Nom d'utilisateur:</label>
          <input type="text" id="utilisateur-input" name="utilisateur" />

          <label for="mot-de-passe-input">Mot de passe:</label>
          <input type="password" id="mot-de-passe-input" name="motDePasse" />

          <input type="Submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>