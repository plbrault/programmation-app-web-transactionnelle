<?php
  // Les variables ont des types.

  // Nombre entier (integer ou int)
  $noExemple = 9;

  // Nombre à virgule (float)
  $prix = 3.55;

  // Chaîne de caractères (string)
  $nomProduit = "Hamburger";
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
    <p>
      Le prix d'un <?php echo $nomProduit; ?> est de <?php echo $prix; ?> $.
    </p>
  </body>
</html>
