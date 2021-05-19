<?php
  $noExemple = 2;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php
        echo 'Exemple ';
        if ($noExemple < 10) {
          echo 0;
        }
        echo $noExemple;
      ?>
    </title>
  </head>
  <body>
    <table>
      <?php
        if (!isset($_GET['nombre1'])) {
          echo 'Paramètre <strong>nombre1</strong> manquant.';
          exit;
        }
        if (!isset($_GET['nombre2'])) {
          echo 'Paramètre <strong>nombre2</strong> manquant.';
          exit;
        }
        if (!isset($_GET['operateur'])) {
          echo 'Paramètre <strong>operateur</strong> manquant.';
          exit;
        }        

        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        $operateur = $_GET['operateur'];

        switch ($operateur) {
          case '+': // Doit être passé comme « %2B » dans l'URL
            echo "$nombre1 + $nombre2 = " . ($nombre1 + $nombre2);
            break;
          case '-':
            echo "$nombre1 - $nombre2 = " . ($nombre1 - $nombre2);
            break;
          case '*':
            echo "$nombre1 * $nombre2 = " . ($nombre1 * $nombre2);
            break;
          case '/':
            echo "$nombre1 / $nombre2 = " . ($nombre1 / $nombre2);
            break;
          case '%': // Doit être passés comme « %25 » dans l'URL
            echo "$nombre1 % $nombre2 = " . ($nombre1 % $nombre2);
            break;
          default:
            echo "Opérateur « $operateur » invalide.";
        }
      ?>
    </table>
  </body>
</html>
