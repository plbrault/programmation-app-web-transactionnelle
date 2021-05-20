<?php
  function FizzBuzz() {
    $fizzBuzz = array();

    for ($i = 1; $i <= 100; $i++) {
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
      $fizzBuzz = FizzBuzz();

      foreach ($fizzBuzz as $element) {
        echo "$element <br />";
      }
    ?>
  </body>
</html>
