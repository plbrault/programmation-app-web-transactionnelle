<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (C)</title>
  </head>
  <body>
    <?php
      $nombres = array();
      
      for ($i = 0; $i <= 200; $i += 2) {
        array_push($nombres, $i);
      }
    ?>

    <select name="nombre">
      <?php
        foreach ($nombres as $nombre) {
          echo "<option value=\"$nombre\">$nombre</option>";
        }
      ?>
    </select>
  </body>
</html>
