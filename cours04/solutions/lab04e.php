<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (E)</title>
  </head>
  <body>
    <?php
      $extraits = [
        'Un petit pain blanc',
        'plein de pain blanc,',
        'un blanc banc',
        'peint de blanc pain.'
      ];

      $phrase = '';
      foreach ($extraits as $extrait) {
        $phrase .= "$extrait ";
      }

      echo $phrase;
    ?>
  </body>
</html>
