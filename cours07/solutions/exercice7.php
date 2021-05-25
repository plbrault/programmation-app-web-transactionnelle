<?php
  $succursales = [
    'Gatineau',
    'Montréal',
    'Sherbrooke',
    'Québec',
    'Trois-Rivières'
  ];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exercice 7</title>
  </head>
  <body>
    <?php
      if (isset($_POST['submit'])) {
        if (!isset($_POST['prenom'])) {
          exit;
        }
        if (!isset($_POST['nom'])) {
          exit;
        }
        if (!isset($_POST['telephone'])) {
          exit;
        }
        if (!isset($_POST['courriel'])) {
          exit;
        }
        if (!isset($_POST['succursale']) && !in_array($_POST['succursale'], $succursales)) {
          exit;
        }
        if (!isset($_POST['message'])) {
          exit;
        }
        if ($_POST['contactPrefere'] !== 'courriel' && $_POST['contactPrefere'] !== 'telephone') {
          exit;
        }

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $succursale = $succursales[$_POST['succursale']];

        echo "Merci <strong>$prenom $nom</strong>, la succursale de <strong>$succursale</strong> vous contactera dans les plus brefs délais.";
      } else {
        ?>
          
        <h1>Demande d'informations</h1>
        <form action="exercice7.php" method="POST">
          <p>
            <label for="prenom-input">Prénom: </label>
            <input type="text" id="prenom-input" name="prenom" required />
          </p>

          <p>
            <label for="nom-input">Nom: </label>
            <input type="text" id="nom-input" name="nom" required />
          </p>
          
          <p>
            <label for="telephone-input">Numéro de téléphone: </label>
            <input type="text" id="telephone-input" name="telephone" required />
          </p>
          
          <p>
            <label for="courriel-input">Adresse courriel: </label>
            <input type="text" id="courriel-input" name="courriel" required />
          </p>
          
          <p>
            <label for="succursale-input">Succursale: </label>
            <select type="text" id="succursale-input" name="succursale">
              <?php
                foreach($succursales as $id => $nomSuccursale) {
                  echo "<option value=\"$id\">$nomSuccursale</option>";
                }
              ?>
            </select>
          </p>
          
          <p>
            <label for="message-input">Message :</label>
            <textarea type="text" id="message-input" name="message" required></textarea>
          </p>


          <p>
            <label>Méthode de contact préférée: </label>

            <input id="contact-prefere-courriel-input" type="radio" name="contactPrefere" value="courriel" />
            <label for="contact-prefere-courriel-input">Courriel</label>

            <input id="contact-prefere-telephone-input" type="radio" name="contactPrefere" value="telephone" />
            <label for="contact-prefere-telephone-input">Téléphone</label>
          </p>

          <input type="submit" name="submit" value="Soumettre" />

        </form>

        <?php
      }
    ?>
  </body>
</html>