<?php
  include('verifierMotDePasse.php');
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

      if (isset($_POST['utilisateur']) && isset($_POST['motDePasse'])) {
        $utilisateur = $_POST['utilisateur'];
        $motDePasse = $_POST['motDePasse'];

        if (verifierMotDePasse($utilisateur, $motDePasse)) {
          echo "<p>Bonjour <strong>$utilisateur</strong> !</p>";
        } else {
          echo "<p>Nom d'utilisateur ou mot de passe invalide.</p>";
          include('formulaire.php');
        }
      } else {
        include('formulaire.php');
      }
    ?>
  </body>
</html>