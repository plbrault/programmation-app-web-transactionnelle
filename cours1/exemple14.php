<?php
  $noExemple = 14;

  // Opérations arithmétiques

  $a = 3;
  $b = 2;

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
      Exemple <?php echo $noExemple; ?>
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
