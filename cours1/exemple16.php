<?php
  $noExemple = 16;

  $a = 3;
  $b = 4;
  $c = 6;

  // On peut effectuer plusieurs opérations d'un coup
  $d = $a + $b * $c;

  // Les priorités des opérations sont respectées
  // (https://fr.wikipedia.org/wiki/Ordre_des_op%C3%A9rations)
  // On peut utiliser des parenthèses
  $e = ($a + $b) * $c;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <Exemple <?php echo $noExemple; ?>
    </title>
  </head>
  <body>
    <h1>Exemple <?php echo $noExemple; ?></h1>
    <?php
      echo "
        <p>$a + $b * $c = $d</p>
        <p>($a + $b) * $c = $e</p>
      ";
    ?>
  </body>
</html>
