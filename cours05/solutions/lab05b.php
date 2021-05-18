<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 05 (B)</title>
  </head>
  <body>
    <?php
      $regionsParVilles = array(
        'Sherbrooke' => 'Estrie',
        'Longueuil' => 'Montérégie',
        'Québec' => 'Capitale-Nationale',
        'Montréal' => 'Montréal',
        'Saguenay' => 'Saguenay-Lac-Saint-Jean',
        'Trois-Rivières' => 'Mauricie'
      );

      if (!isset($_GET['ville'])) {
        echo 'Le paramètre <strong>ville</strong> est manquant.';
        exit;
      }

      $ville = $_GET['ville'];

      if (!isset($regionsParVilles[$ville])) {
        echo 'Nous ne connaissons pas votre ville.';
      } else {
        echo $regionsParVilles[$ville];
      }
    ?>
  </body>
</html>
