<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 12</title>
  </head>
  <body>
    <?php
      if (isset($_POST['condiments']) && is_array($_POST['condiments'])) {
        foreach ($_POST['condiments'] as $condiment) {
          echo htmlspecialchars($condiment) . '<br />';
        }
      } else {
        ?>

        <form action="exemple12.php" method="POST">

          <fieldset>
            <legend>Que voulez-vous dans votre hot dog?</legend>
            <p>
              <!-- Envoi d'un tableau condiments -->
              <input type="checkbox" id="ketchup-input" name="condiments[]" value="ketchup" />
              <label for="ketchup-input">Ketchup</label>
            </p>
            <p>
              <input type="checkbox" id="moutarde-input" name="condiments[]" value="moutarde" />
              <label for="moutarde-input">Moutarde</label>     
            </p>
            <p>
              <input type="checkbox" id="relish-input" name="condiments[]" value="relish" />
              <label for="relish-input">Relish</label>     
            </p>            
          </fieldset>

          <input type="submit" name="submit" />
        </form>

        <?php
      }
    ?>
  </body>
</html>