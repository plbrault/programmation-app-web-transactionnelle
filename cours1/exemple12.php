<?php
  $noExemple = 12;

  $prenom = 'Homer';
  $nom = 'Simpson';

  // Concaténation avec les apostrophes
  $presentation = 'Bonjour, mon nom est <strong>' . $prenom . ' ' . $nom . '</strong>.';
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
    <?php echo $presentation; ?>
  </body>
</html>
