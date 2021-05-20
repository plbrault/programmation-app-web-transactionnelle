<?php
  function direBonjour($prenom, $nom) {
    echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 03</title>
  </head>
  <body>
    <?php
      if (isset($_POST['prenom']) && isset($_POST['nom'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
  
        direBonjour($prenom, $nom);
        
        echo '<a href="exemple03.php">&lt; Retour</a>';
      } else {
        ?>

        <form action="exemple03.php" method="POST">
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