<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 11</title>
  </head>
  <body>
    <?php
      if (isset($_POST['submit'])) {
        if ($_POST['ketchup']) {
          echo 'Ketchup <br />';
        }
        if ($_POST['moutarde']) {
          echo 'Moutarde <br />';
        }
        if ($_POST['relish']) {
          echo 'Relish <br />';
        }
      } else {
        ?>

        <form action="exemple11.php" method="POST">

          <fieldset>
            <legend>Que voulez-vous dans votre hot dog?</legend>
            <p>
              <input type="checkbox" id="ketchup-input" name="ketchup" />
              <label for="ketchup-input">Ketchup</label>
            </p>
            <p>
              <input type="checkbox" id="moutarde-input" name="moutarde" />
              <label for="moutarde-input">Moutarde</label>     
            </p>
            <p>
              <input type="checkbox" id="relish-input" name="relish" />
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