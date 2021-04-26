<?php
  $noExemple = 15;

  // Qu'arrive-t-il si nos variables ne sont pas des nombres?

  $a = "roche";
  $b = "papier";

  // Addition
  $c = $a + $b;

  // Soustraction
  $d = $a - $b;

  // Multiplication
  $e = $a * $b;

  // Division
  $f = $a / $b;

  // Modulo (reste de la division)
  $g = $a % $b;
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
      echo "
        <p>$a + $b = $c</p>
        <p>$a - $b = $d</p>
        <p>$a * $b = $e</p>
        <p>$a / $b = $f</p>
        <p>$a % $b = $g</p> 
      ";
    ?>
  </body>
</html>
