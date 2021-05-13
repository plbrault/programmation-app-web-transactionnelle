<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 03 (F)</title>
  </head>
  <body>
    <select name="nombre">
      <option value="">Sélectionnez un nombre</option>
      <?php
        for ($i = 1; $i <= 100; $i++) {
          echo "<option value=\"$i\">$i</option>";
        }
      ?>
    </select>
  </body>
</html>
