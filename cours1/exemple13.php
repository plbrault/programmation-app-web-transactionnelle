<?php
  $noExemple = 13;

  $prenom = 'Homer';
  $nom = 'Simpson';
  $anneeNaissance = 1956;

  // Concaténation avec les apostrophes incluant un int
  $presentation = 'Bonjour, mon nom est <strong>'
    . $prenom. ' ' . $nom . '</strong> '
    . 'et je suis né en ' . $anneeNaissance . '.';
    ;
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
