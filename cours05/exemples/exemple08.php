<?php
  $mois = array(
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre"
  );
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 08</title>
  </head>
  <body>
    <?php
      if (isset($_POST['prenom']) && isset($_POST['nom'])) {

        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
  
        echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
        
        echo '<a href="exemple07.php">&lt; Retour</a>';
      }
      else {
        ?>

        <form action="exemple08.php" method="POST">
          <label for="prenom-input">Prénom :</label>
          <input type="text" id="prenom-input" name="prenom" />

          <label for="nom-input">Nom : </label>
          <input type="text" id="nom-input" name="nom" />

          <label for="jour-naissance-select">Date de naissance:</label>
          
          <select id="jour-naissance-select" name="jourNaissance">
            <?php
              for ($i = 1; $i <= 12; $i++) {
                echo "<option value=\"$i\">";
                if ($i < 10) {
                  echo 0;
                }
                echo "$i</option>";
              }
            ?>
          </select>

          <select id="mois-naissance-select" name="moisNaissance">
            <?php
              foreach ($mois as $numeroMois => $nomMois) {
                echo "<option value=\"$numeroMois\">$nomMois</option>";
              }
            ?>
          </select>

          <select id="annee-naissance-select" name="anneeNaissance">
            <?php
              for ($i = 1900; $i < 2021; $i++) {
                echo "<option value=\"$i\">$i</option>";
              }
              echo '<option selected value="2021">2021</option>';
            ?>
          </select>

          <input type="Submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>