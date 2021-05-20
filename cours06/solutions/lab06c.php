<?php
  function FizzBuzz($min, $max) {
    $fizzBuzz = array();

    for ($i = $min; $i <= $max; $i++) {
      if ($i % 3 === 0 && $i % 5 === 0) {
        array_push($fizzBuzz, 'FizzBuzz');
      } else if ($i % 3 === 0) {
        array_push($fizzBuzz, 'Fizz');
      } else if ($i % 5 === 0) {
        array_push($fizzBuzz, 'Buzz');
      } else {
        array_push($fizzBuzz, $i);
      }
    }

    return $fizzBuzz;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 06 (B)</title>
  </head>
  <body>
    <?php
      if (isset($_POST['min']) && isset($_POST['max'])) {
        $min = intval($_POST['min']);
        $max = intval($_POST['max']);

        $fizzBuzz = FizzBuzz($min, $max);

        foreach ($fizzBuzz as $element) {
          echo "$element <br />";
        }
      } else {
        ?>

        <h1>FizzBuzz</h1>

        <form action="lab06c.php" method="POST">
          <label for="min-input">Valeur minimale :</label>
          <input type="number" id="min-input" name="min" value="1" />

          <label for="max-input">Valeur maximale : </label>
          <input type="text" id="max-input" name="max" value="100" />

          <input type="Submit" value="Soumettre" />
        </form>

        <?php        
      }
    ?>
  </body>
</html>
