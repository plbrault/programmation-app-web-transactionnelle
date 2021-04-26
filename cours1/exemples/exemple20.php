<?php
  $noExemple = 20;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple <?php echo $noExemple; ?>
    </title>
  </head>
  <body>
    <h1>Exemple <?php echo $noExemple; ?></h1>
    <?php
      /*
        On peut recevoir des variables par l'URL

        Ex: http://localhost/cours1/exemples/exemple20.php?nom=Simpson&prenom=Homer

        Pour récupérer les variables nom et prenom, on utilise $_GET["nom"] et $_GET["prenom"]
      */

      $prenom = $_GET["prenom"];
      $nom = $_GET["nom"];

      echo "<p>Bonjour $prenom $nom!</p>";
    ?>
  </body>
</html>
