<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 10</title>
  </head>
  <body>
    <?php
      if (isset($_POST['salade'])) {
        $salade = $_POST['salade'];

        if ($salade !== 'cremeuse' && $salade !== 'traditionnelle') {
          exit;
        }

        if ($salade === 'cremeuse') {
          $salade = 'crémeuse';
        }

        echo "<p>Vous avez choisi la salade $salade.</p>";
      } else {
        ?>

        <form action="exemple10.php" method="POST">

          <fieldset>
            <legend>Crémeuse ou traditionnelle?</legend>
            <p>
              <input type="radio" id="cremeuse-input" name="salade" value="cremeuse" required />
              <label for="cremeuse-input">Crémeuse</label>
            </p>
            <p>
              <input type="radio" id="traditionnelle-input" name="salade" value="traditionnelle" required />
              <label for="traditionnelle-input">Traditionnelle</label>     
            </p>
          </fieldset>

          <input type="submit" />
        </form>

        <?php
      }
    ?>
  </body>
</html>