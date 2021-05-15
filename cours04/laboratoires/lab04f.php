<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (F)</title>
    <link rel="stylesheet" type="text/css" href="lab04f.css" />
  </head>
  <body>
    <table>
      <?php
        $matrice = [];

        for ($i = 0; $i < 10; $i++) {
          $ligne = [];
          for ($j = 0; $j < 10; $j++) {
            array_push($ligne, $j + ($i * 10));
          }
          array_push($matrice, $ligne);
        }

        echo '<table>';
        foreach ($matrice as $ligne) {
          echo '<tr>';
          foreach ($ligne as $nombre) {
            echo '<td>';
            echo $nombre;
            echo '</td>';
          }
          echo '</tr>';
        }
        echo '</table>';
      ?>
    </table>
  </body>
</html>
