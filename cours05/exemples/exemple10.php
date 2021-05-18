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
          <p>Crémeuse ou traditionnelle?</p>
          
          <input type="radio" id="cremeuse-input" name="salade" value="cremeuse" checked />
          <label for="cremeuse-input">Crémeuse</label>

          <input type="radio" id="traditionnelle-input" name="salade" value="traditionnelle" />
          <label for="traditionnelle-input">Traditionnelle</label>     
          
          <input type="submit" />
        </form>

        <?php
      }
    ?>
  </body>
</html>