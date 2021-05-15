<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (D)</title>
  </head>
  <body>
    <?php
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

      foreach ($fizzBuzz as $element) {
        echo $element . '<br />';
      }
    ?>
  </body>
</html>
