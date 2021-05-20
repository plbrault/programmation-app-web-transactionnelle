<?php
  function FizzBuzz() {
    for ($i = 1; $i <= 100; $i++) {
      if ($i % 3 === 0 && $i % 5 === 0) {
        echo 'FizzBuzz';
      } else if ($i % 3 === 0) {
        echo 'Fizz';
      } else if ($i % 5 === 0) {
        echo 'Buzz';
      } else {
        echo $i;
      }
      echo '<br />';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 06 (A)</title>
  </head>
  <body>
    <?php
      FizzBuzz();
    ?>
  </body>
</html>
