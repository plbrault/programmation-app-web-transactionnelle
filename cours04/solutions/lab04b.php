<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 04 (B)</title>
  </head>
  <body>
    <?php
      // Déclarer un tableau vide
      $nombres = array();

      // À l’aide d’une boucle for, ajouter au tableau les nombres de 1 à 99.
      for ($i = 1; $i <= 10; $i++) {
        array_push($nombres, $i);
      }

      // À l’aide d’une boucle foreach, afficher les éléments du tableau.
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }

      // Afficher une ligne horizontale (balise hr).
      echo '<hr />';

      // À l’aide d’une boucle for, multiplier chaque nombre du tableau par lui-même.
      for ($i = 0; $i < count($nombres); $i++) {
        $nombres[$i] *= $nombres[$i];
      }

      // À l’aide d’une boucle foreach, afficher les éléments du tableau de nouveau.
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }

      // Afficher une ligne horizontale (balise hr).
      echo '<hr />';

      // À l’aide d’une boucle foreach, incrémenter chaque élément du tableau de 1.
      foreach ($nombres as &$nombre) {
        $nombre++;
      }
      unset($nombre); // Important! Voir l'exemple 04.

      // À l’aide d’une boucle foreach, afficher les éléments du tableau une troisième fois.
      foreach ($nombres as $nombre) {
        echo "$nombre <br />";
      }
    ?>
  </body>
</html>
