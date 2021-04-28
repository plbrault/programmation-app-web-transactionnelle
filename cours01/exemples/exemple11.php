<?php
  $noExemple = 11;

  $prenom = 'Homer';
  $nom = 'Simpson';

  // Concaténation avec les guillemets
  $nomComplet = "$prenom $nom";
  $presentation = "Bonjour, mon nom est <strong>$nomComplet</strong>.";
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
    <?php echo $presentation; ?>
  </body>
</html>
