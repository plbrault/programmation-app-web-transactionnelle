<?php
  $noExemple = 10;
  $prix = 3.55;
  $nomProduit = "Hamburger";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <h1>Exemple <?php echo $noExemple; ?></h1>
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
