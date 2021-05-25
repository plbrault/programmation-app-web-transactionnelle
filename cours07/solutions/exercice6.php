<!DOCTYPE html>
<html>
  <head>
    <title>
      Exercice 6
    </title>
    <link rel="stylesheet" type="text/css" href="lab01g.css" />
  </head>
  <body>
    <?php
      if (!isset($_GET['prix'])) {
        echo 'Paramètre <strong>prix</strong> manquant.';
        exit;
      }
      if (!isset($_GET['montantPaye'])) {
        echo 'Paramètre <strong>montantPaye</strong> manquant.';
        exit;
      }

      $prix = $_GET['prix'];
      $montantPaye = $_GET['montantPaye'];

      if ($prix === $montantPaye) {
        echo 'Montant exact.';
      } else if ($montantPaye < $prix) {
        $manquant = $prix - $montantPaye;
        echo "Il manque $manquant$.";
      } else {
        $montantARemettre = $montantPaye - $prix;

        echo "Montant à remettre au client: $montantARemettre$<br />";

        while ($montantARemettre > 0) {
          if ($montantARemettre >= 100) {
            $montantARemettre -= 100;
            echo '100$';
          } else if ($montantARemettre >= 50) {
            $montantARemettre -= 50;
            echo '50$';
          } else if ($montantARemettre >= 20) {
            $montantARemettre -= 20;
            echo '20$';
          } else if ($montantARemettre >= 10) {
            $montantARemettre -= 10;
            echo '10$';
          } else if ($montantARemettre >= 5) {
            $montantARemettre -= 5;
            echo '5$';
          } else if ($montantARemettre >= 2) {
            $montantARemettre -= 2;
            echo '2$';
          } else if ($montantARemettre >= 1) {
            $montantARemettre -= 1;
            echo '1$';
          } else if ($montantARemettre >= 0.25)  {
            $montantARemettre -= 0.25;
            echo '25¢';
          } else if ($montantARemettre >= 0.10) {
            $montantARemettre -= 0.10;
            echo '10¢';
          } else if ($montantARemettre >= 0.05) {
            $montantARemettre -= 0.05;
            echo '5¢';
          }

          if ($montantARemettre === 0.03 || $montantARemettre === 0.04) {
            $montantARemettre = 0;
            echo '5¢';
          }
          if ($montantARemettre < 0.03) {
            $montantARemettre = 0;
          }

          echo '<br />';
        }
      }
    ?>
  </body>
</html>
