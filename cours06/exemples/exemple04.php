<?php
  function afficherNombresPairs($min, $max) {
    if ($min % 2 === 1) {
      $min++;
    }
    for ($i = $min; $i <= $max; $i += 2) {
      echo "$i <br />";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 04</title>
  </head>
  <body>
    <?php
      if (isset($_POST['min']) && isset($_POST['max'])) {
        $min = intval($_POST['min']);
        $max = intval($_POST['max']);

        echo '<p>';
        afficherNombresPairs($min, $max);
        echo '</p>';

        echo '<a href="exemple04.php">&lt; Retour</a>';
      } else {
        ?>

        <h1>Générer une liste de nombres pairs</h1>

        <form action="exemple04.php" method="POST">
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