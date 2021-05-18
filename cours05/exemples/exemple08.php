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
      // Le bouton Soumettre a un name. On peut s'en servir pour valider rapidement que le formulaire a été envoyé.
      if (isset($_POST['submit'])) {
        /*
          Si on est ici, c'est que le formulaire a été envoyé.
          MAIS ça ne veut pas dire qu'il ne faut pas valider les données!
          Un utilisateur malicieux pourrait avoir modifié le formulaire.

          Principe NTUI: "Never Trust User Input" (Ne jamais faire confiance aux saisies de l'utilisateur)
        */
        if (!isset($_POST['prenom']) || !isset($_POST['nom'])) {
          /*
            Si on entre dans cette condition, ça veut dire qu'on a affaire à un utilisateur malicieux qui
            a modifié notre formulaire. Ça ne vaut pas la peine de ré-afficher le formulaire pour être
            gentil avec lui, on se contente donc d'arrêter l'exécution du script.

            Même chose pour les autres validations ci-dessous.
          */          
          exit;
        }
        if (
          !isset($_POST['jourNaissance'])
          || !is_numeric($_POST['jourNaissance']) // is_numeric retourne true si la valeur est numérique (même s'il s'agit d'un string)
          || !is_int(+$_POST['jourNaissance']) // L'opérateur + convertit le string en nombre, puis is_int retourne true s'il s'agit d'un entier
          || $_POST['jourNaissance'] < 1
          || $_POST['jourNaissance'] > 31
        ) {
          exit;
        }
        if (
          !isset($_POST['moisNaissance'])
          || !is_numeric($_POST['moisNaissance'])
          || !is_int(+$_POST['moisNaissance'])
          || $_POST['moisNaissance'] < 1
          || $_POST['moisNaissance'] > 12
        ) {
          exit;
        }
        if (
          !isset($_POST['anneeNaissance'])
          || !is_numeric($_POST['anneeNaissance'])
          || !is_int(+$_POST['anneeNaissance'])
          || $_POST['anneeNaissance'] < 1900
          || $_POST['moisNaissance'] > 2021
        ) {
          exit;
        }

        // Si on se rend ici, c'est que les données reçues sont valides!

        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);

        // htmlspecialchars n'est pas nécessaire pour les variables de la date de naissance
        // puisqu'on a validé que ce sont des nombres entiers
        $jourNaissance = $_POST['jourNaissance'];
        $moisNaissance = $_POST['moisNaissance'];
        $anneeNaissance = $_POST['anneeNaissance'];
    
        // On affiche finalement le résultat du formulaire
        echo "<p>Bonjour <strong>$prenom $nom</strong>!</p>";
        echo "<p>Vous êtes né.e le $jourNaissance $mois[$moisNaissance] $anneeNaissance.</p>";
        
        echo '<a href="exemple08.php">&lt; Retour</a>';
      } else {
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

          <!-- On a ajouté un name au bouton Soumettre -->
          <input type="Submit" name="submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>