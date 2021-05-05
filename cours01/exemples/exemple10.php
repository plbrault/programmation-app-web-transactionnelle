<?php
  $noExemple = 10;
  $prix = 2.99;
  $nomProduit = "Hamburger";

  // Une variable peut changer de valeur
  $prix = 3.25;
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
      // Les deux lignes de code suivantes produiront des résultats différents.
      echo "<p>Le prix d'un $nomProduit est de $prix $.</p>";
      echo '<p>Le prix d\'un $nomProduit est de $prix $.</p>';
    ?>
  </body>
</html>
