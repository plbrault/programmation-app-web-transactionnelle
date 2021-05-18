<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 08</title>
  </head>
  <body>
    <?php
      if (isset($_POST['prenom']) && isset($_POST['nom'])) {
        /*
          Rien n'empêche l'utilisateur de saisir du HTML dans les champs d'un formulaire.
          Cela peut constituer un risque de sécurité, surtout s'il utilise des balises <script></script>.
          htmlspecialchars() permet de remplacer les < et > par des &lt; et &gt;, rendant ainsi le
          HTML inoffensif.
        */
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
  
        echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
        
        echo '<a href="exemple07.php">&lt; Retour</a>';
      } else {
        ?>

        <form action="exemple07.php" method="POST">
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