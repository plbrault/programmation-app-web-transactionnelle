<?php
  function genererNombresPairs($min, $max) {
    if ($min % 2 === 1) {
      $min++;
    }
    $nombresPairs = [];
    for ($i = $min; $i <= $max; $i += 2) {
      array_push($nombresPairs, $i);
    }
    return $nombresPairs;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 05</title>
  </head>
  <body>
    <?php
      if (isset($_POST['min']) && isset($_POST['max'])) {
        $min = intval($_POST['min']);
        $max = intval($_POST['max']);

        echo '<p>';
        $nombresPairs = genererNombresPairs($min, $max);
        foreach ($nombresPairs as $nombre) {
          echo "$nombre <br />";
        }
        echo '</p>';

        echo '<a href="exemple05.php">&lt; Retour</a>';
      } else {
        ?>

        <h1>Générer une liste de nombres pairs</h1>

        <form action="exemple05.php" method="POST">
          <label for="min-input">Valeur minimale :</label>
          <input type="number" id="min-input" name="min" value="0" />

          <label for="max-input">Valeur maximale : </label>
          <input type="text" id="max-input" name="max" value="10" />

          <input type="Submit" value="Soumettre" />
        </form>

        <?php
      }
    ?>
  </body>
</html>