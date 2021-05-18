<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 06</title>
  </head>
  <body>
    <?php
      /*
        Ici, on définit le formulaire et la page cible du formulaire dans le même fichier PHP.

        La logique est la suivante:
        - Si on a reçu les données du formulaire, afficher la page cible.
        - Sinon, afficher le formulaire.
      */

      // Si on a reçu les données du formulaire, afficher "Bonjour $prenom $nom"
      if (isset($_POST['prenom']) && isset($_POST['nom'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
  
        echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
        
        echo '<a href="exemple06.php">&lt; Retour</a>';
      }
      // Sinon, afficher le formulaire
      else {
        ?>

        <!-- L'action pointe sur la page elle-même -->
        <form action="exemple06.php" method="POST">
          <label for="prenom-input">Prénom :</label>
          <input type="text" id="prenom-input" name="prenom" />

          <label for="nom-input">Nom : </label>
          <input type="text" id="nom-input" name="nom" />

          <input type="Submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>